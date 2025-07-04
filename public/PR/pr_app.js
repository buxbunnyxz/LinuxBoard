// Helper function to parse the label string
function parseLabel(label) {
  const fields = {};
  label.split('|').forEach(pair => {
    const [key, value] = pair.split('~');
    fields[key] = value;
  });
  return {
    address: fields['R04'] || '',
    city: fields['R06'] || '',
    postal: fields['R07'] || ''
  };
}

const startBtn = document.getElementById('start-scan');
const resultDiv = document.getElementById('result');
const readerDiv = document.getElementById('reader');
const stopsList = document.getElementById('stops-list');
let html5QrcodeScanner;
let stops = []; // Array to hold all scanned stops

function updateStopsList() {
  stopsList.innerHTML = '';
  stops.forEach((stop, idx) => {
    const li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between align-items-center';
    li.innerHTML = `
      <span>
        <strong>${stop.address}</strong>
        <br><small>${stop.city}, ${stop.postal}</small>
      </span>
      <button class="btn btn-sm btn-danger" onclick="removeStop(${idx})"><i class="bi bi-trash"></i></button>
    `;
    stopsList.appendChild(li);
  });
}

window.removeStop = function(idx) {
  stops.splice(idx, 1);
  updateStopsList();
};

startBtn.onclick = function () {
  readerDiv.style.display = "block";
  startBtn.style.display = "none";
  html5QrcodeScanner = new Html5Qrcode("reader");
  html5QrcodeScanner.start(
    { facingMode: "environment" },
    {
      fps: 10,
      qrbox: { width: 320, height: 320 }
    },
    (decodedText, decodedResult) => {
      html5QrcodeScanner.stop();
      readerDiv.style.display = "none";
      startBtn.style.display = "block";
      // Parse label and show results
      const parsed = parseLabel(decodedText);
      resultDiv.style.display = "block";
      resultDiv.innerHTML = `
        <strong>Address:</strong> ${parsed.address}<br>
        <strong>City:</strong> ${parsed.city}<br>
        <strong>Postal Code:</strong> ${parsed.postal}
        <hr>
        <span class="text-muted" style="font-size:0.92em;">Raw: ${decodedText}</span>
      `;
      // Add to stops array and update list
      stops.push(parsed);
      updateStopsList();
      // SweetAlert2 Example
      Swal.fire({
        icon: 'success',
        title: 'Label scanned!',
        html: `<strong>Address:</strong> ${parsed.address}<br>
               <strong>City:</strong> ${parsed.city}<br>
               <strong>Postal:</strong> ${parsed.postal}`,
        confirmButtonColor: '#247B7B'
      });
    },
    (errorMessage) => {}
  ).catch((err) => {
    resultDiv.style.display = "block";
    resultDiv.innerText = "Camera error: " + err;
    readerDiv.style.display = "none";
    startBtn.style.display = "block";
    Swal.fire({
      icon: 'error',
      title: 'Camera error',
      text: err,
      confirmButtonColor: '#247B7B'
    });
  });
};

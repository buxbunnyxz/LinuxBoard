<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PuroRouting - Scan Label</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- html5-qrcode -->
  <script src="https://unpkg.com/html5-qrcode"></script>
  <!-- Your custom CSS -->
  <link href="pr_style.css" rel="stylesheet">
</head>
<body>
  <div class="container text-center">
    <div class="mb-4">
      <span class="brand-title"><i class="bi bi-geo-alt icon"></i> PuroRouting</span>
      <div class="text-muted fs-5">Scan your package labels, extract data, and optimize your route.</div>
    </div>
    <button class="scan-btn mb-3" id="start-scan">
      <i class="bi bi-camera"></i> Scan Label
    </button>
    <div id="reader"></div>
    <div id="result"></div>
  </div>
  <!-- Bootstrap JS Bundle (optional, for future components) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Your custom JS -->
  <script src="pr_app.js"></script>
</body>
</html>

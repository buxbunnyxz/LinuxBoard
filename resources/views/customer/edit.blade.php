@section('title',$title)
@section('description',$description)
@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                <h4 class="text-capitalize">{{ trans('menu.customer-edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card mb-50">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-10">
                <div class="mt-40 mb-50">
                    @foreach ($find_customer as $customer)
                        @php ( $has_profile_picture = ! empty( $customer->profile_picture ) )
                        <form action="{{ route('customer.update',[app()->getLocale(),$customer->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="account-profile d-flex align-items-center mb-4 ">
                                <div class="ap-img pro_img_wrapper">
                                    <input id="profile-picture" type="file" accept="image/*" name="profile-picture" class="d-none image-upload-field" data-preview-element="profile-picture-preview">
                                    <label for="profile-picture">
                                        <img src="{{ $has_profile_picture ? Helper::get_public_storage_asset_url( $customer->profile_picture ) : asset( 'assets/img/svg/user.svg' ) }}" alt="user" class="profile-picture-preview ap-img__main rounded-circle wh-120 bg-lighter d-flex">

                                        <span
                                            title="{{ __('customer_edit_form.pick_image_title') }}"
                                            id="remove_pro_pic"
                                            class="cross clear-input-file-btn"
                                            data-input-has-file="{{ ( $has_profile_picture ) ? 1 : 0 }}"
                                            data-pick-title="{{ __('customer_edit_form.pick_image_title') }}"
                                            data-pick-icon="{{ asset( 'assets/img/svg/camera-white.svg' ) }}"
                                            data-clear-title="{{ __('customer_edit_form.remove_image_title') }}"
                                            data-clear-icon="{{ asset( 'assets/img/svg/close-white.svg' ) }}"
                                            data-input-element-id="profile-picture"
                                            data-preview-element="profile-picture-preview"
                                            data-default-preview-image="{{ asset( 'assets/img/svg/user.svg' ) }}"
                                            data-input-removal-status-field="profile-picture-removal-status"
                                        >
                                            <input type="hidden" class="profile-picture-removal-status" name="remove_profile_picture" value="">
                                            <img src="{{ ( $has_profile_picture ) ? asset( 'assets/img/svg/close-white.svg' ) : asset( 'assets/img/svg/camera-white.svg' ) }}" alt="camera">
                                        </span>
                                    </label>
                                </div>
                                <div class="account-profile__title">
                                    <h6 class="fs-15 ms-20 fw-500 text-capitalize">{{ __('customer_edit_form.profile_photo') }}</h6>
                                </div>
                            </div>
                            <div class="edit-profile__body">
                                <div class="form-group mb-25">
                                    <label for="name" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.name_label') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="name" value="{{ $customer->name }}" id="name" placeholder="{{ __('customer_edit_form.name_placeholder') }}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="email" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.email_label') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="email" id="email" value="{{ $customer->email }}" placeholder="{{ __('customer_edit_form.email_placeholder') }}">
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="phone" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.phone_label') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="phone" value="{{ $customer->phone }}" id="phone" placeholder="{{ __('customer_edit_form.phone_placeholder') }}">
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="profession" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.profession_label') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="profession" id="profession" value="{{ $customer->profession }}" placeholder="{{ __('customer_edit_form.profession_placeholder') }}">
                                    @if($errors->has('profession'))
                                        <p class="text-danger">{{ $errors->first('profession') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="gender" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.gender_label') }} <span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="gender" id="gender">
                                        <option value="">{{ __('customer_edit_form.gender_placeholder') }}</option>
                                        <option value="male" {{ $customer->gender == 'male' ? 'selected':'' }}>{{ __('customer_edit_form.gender_male') }}</option>
                                        <option value="female" {{ $customer->gender == 'female' ? 'selected':'' }}>{{ __('customer_edit_form.gender_female') }}</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="address" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.address_label') }}</label>
                                    <textarea class="form-control ih-medium ip-gray radius-xs b-light px-15" name="address" style="height: 175px;" id="address" placeholder="{{ __('customer_edit_form.address_placeholder') }}">{{ $customer->address }}</textarea>
                                </div>
                                <div class="form-group mb-25">
                                    <label for="status" class="color-dark fs-14 fw-500 align-center">{{ __('customer_edit_form.status_label') }}<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="status" id="status">
                                        @foreach ( get_status_meta() as $status_key => $status_meta )
                                            <option value="{{ $status_key }}" {{ $customer->status == $status_key ? 'selected' : '' }}>
                                                {{ $status_meta['label'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                                <div class="button-group d-flex pt-25 justify-content-md-end justify-content-start">
                                    <a href="{{ route('customer.list',app()->getLocale()) }}" class="btn btn-light btn-default btn-squared fw-400 text-capitalize m-sm-0 m-1">{{ __('customer_edit_form.cancel_button') }}</a>
                                    <button type="submit" class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">{{ __('customer_edit_form.update_button') }}</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

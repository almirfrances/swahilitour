<!-- resources/views/admin/settings/general.blade.php -->
@extends('admin.layouts.admin')
@section('title', 'General Settings')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">General Settings</h4>
            <p class="text-muted">Manage your general settings efficiently</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.general.update') }}" method="POST">
        @csrf
        <div class="row g-4">
            <!-- Site Information -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Site Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="site_name">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name"
                                value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                            <small class="form-text text-muted">Enter the name of your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="site_email">Site Email</label>
                            <input type="email" class="form-control" id="site_email" name="site_email"
                                value="{{ old('site_email', $settings['site_email'] ?? '') }}" required>
                            <small class="form-text text-muted">Enter the email address for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="site_phone">Site Phone</label>
                            <input type="text" class="form-control" id="site_phone" name="site_phone"
                                value="{{ old('site_phone', $settings['site_phone'] ?? '') }}" required>
                            <small class="form-text text-muted">Enter the phone number for your site (used for calls and
                                WhatsApp chats).</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ old('address', $settings['address'] ?? '') }}">
                            <small class="form-text text-muted">Enter the address of your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="site_description">Site Short Description</label>
                            <textarea class="form-control" id="site_description"
                                name="site_description">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                            <small class="form-text text-muted">Enter the short description of your site.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="booking_note">Booking Note</label>
                            <textarea class="form-control" id="booking_note"
                                name="booking_note">{{ old('booking_note', $settings['booking_note'] ?? '') }}</textarea>
                            <small class="form-text text-muted">Enter Booking Note.</small>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="footer_copyright">Footer Copyright</label>
                            <textarea class="form-control" id="footer_copyright"
                                name="footer_copyright">{{ old('footer_copyright', $settings['footer_copyright'] ?? '') }}</textarea>
                            <small class="form-text text-muted">Enter the footer copyright text for your site.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Payment Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="lipa_number_company">Lipa Number Company</label>
                            <input type="text" class="form-control" id="lipa_number_company" name="lipa_number_company" value="{{ old('lipa_number_company', $settings['lipa_number_company'] ?? '') }}">
                            <small class="form-text text-muted">Enter Lipa Number Company Name.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lipa_number">Lipa Number</label>
                            <input type="text" class="form-control" id="lipa_number" name="lipa_number" value="{{ old('lipa_number', $settings['lipa_number'] ?? '') }}">
                            <small class="form-text text-muted">Enter Lipa Number.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lipa_name">Lipa Number Name</label>
                            <input type="text" class="form-control" id="lipa_name" name="lipa_name" value="{{ old('lipa_name', $settings['lipa_name'] ?? '') }}">
                            <small class="form-text text-muted">Enter Lipa Number Name.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $settings['bank_name'] ?? '') }}">
                            <small class="form-text text-muted">Enter Bank Name</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="swift_code">Swift Code</label>
                            <input type="text" class="form-control" id="swift_code" name="swift_code" value="{{ old('swift_code', $settings['swift_code'] ?? '') }}">
                            <small class="form-text text-muted">Enter Swift Code.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bank_account_number">Bank Account Number</label>
                            <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number', $settings['bank_account_number'] ?? '') }}">
                            <small class="form-text text-muted">Enter Bank Account Number.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bank_account_name">Bank Account Name</label>
                            <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" value="{{ old('bank_account_name', $settings['bank_account_name'] ?? '') }}">
                            <small class="form-text text-muted">Enter Bank Account Name.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bank_branch">Bank Branch</label>
                            <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="{{ old('bank_branch', $settings['bank_branch'] ?? '') }}">
                            <small class="form-text text-muted">Enter Bank Branch.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Social Media Links</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="facebook_url">Facebook URL</label>
                            <input type="url" class="form-control" id="facebook_url" name="facebook_url"
                                value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Facebook URL for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="instagram_url">Instagram URL</label>
                            <input type="url" class="form-control" id="instagram_url" name="instagram_url"
                                value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Instagram URL for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="telegram_url">Telegram URL</label>
                            <input type="url" class="form-control" id="telegram_url" name="telegram_url"
                                value="{{ old('telegram_url', $settings['telegram_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Telegram URL for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="twitter_url">Twitter URL</label>
                            <input type="url" class="form-control" id="twitter_url" name="twitter_url"
                                value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Twitter URL for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="youtube_url">Youtube URL</label>
                            <input type="url" class="form-control" id="youtube_url" name="youtube_url"
                                value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Youtube URL for your site.</small>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Appearance -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Appearance</h5>
                    </div>
                    <div class="card-body">
                        <!-- almir Base Color -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="almir_base">Base Color</label>
                                <input type="color" class="form-control" id="almir_base" name="almir_base"
                                    value="{{ old('almir_base', $settings['almir_base'] ?? '#5cff56') }}">
                                <small class="form-text text-muted">Choose the base color for your site.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="almir_primary">Primary Color</label>
                                <input type="color" class="form-control" id="almir_primary" name="almir_primary"
                                    value="{{ old('almir_primary', $settings['almir_primary'] ?? '#2D2330') }}">
                                <small class="form-text text-muted">Choose the primary theme color for your
                                    site.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="almir_secondary">Secondary Color</label>
                                <input type="color" class="form-control" id="almir_secondary" name="almir_secondary"
                                    value="{{ old('almir_secondary', $settings['almir_secondary'] ?? '#736D75') }}">
                                <small class="form-text text-muted">Choose the secondary theme color for your
                                    site.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="almir_footer">Footer Color</label>
                                <input type="color" class="form-control" id="almir_footer" name="almir_footer"
                                    value="{{ old('almir_footer', $settings['almir_footer'] ?? '#736D75') }}">
                                <small class="form-text text-muted">Choose the Footer color for your site.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="almir_copyright_footer">Footer Copyright Color</label>
                                <input type="color" class="form-control" id="almir_copyright_footer"
                                    name="almir_copyright_footer"
                                    value="{{ old('almir_copyright_footer', $settings['almir_copyright_footer'] ?? '#736D75') }}">
                                <small class="form-text text-muted">Choose the Footer Copyright color for your
                                    site.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Maintenance Page</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="soon_title">Maintenance Page Title</label>
                            <input type="text" class="form-control" id="soon_title" name="soon_title"
                                value="{{ old('soon_title', $settings['soon_title'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Maintenance Page Title eg <code>Coming
                                    Soon</code>.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="soon_heading">Maintenance Into</label>
                            <input type="text" class="form-control" id="soon_heading" name="soon_heading"
                                value="{{ old('soon_heading', $settings['soon_heading'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Maintenance Page Intro. Add <code>*</code> for
                                each short sentence to separate</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="twitter_url">Twitter URL</label>
                            <input type="url" class="form-control" id="twitter_url" name="twitter_url"
                                value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Twitter URL for your site.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="youtube_url">Youtube URL</label>
                            <input type="url" class="form-control" id="youtube_url" name="youtube_url"
                                value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}">
                            <small class="form-text text-muted">Enter the Youtube URL for your site.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary waves-effect waves-light me-2">
                <i class="ti ti-check me-1"></i> Save Changes
            </button>
            <button type="button" class="btn btn-label-secondary waves-effect" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
</div>
@endsection

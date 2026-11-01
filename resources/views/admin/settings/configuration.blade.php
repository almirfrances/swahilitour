@extends('admin.layouts.admin')

@section('title', 'Site Configurations')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Site Configurations</h4>
    <p class="mb-4">
        Manage and customize various configurations of your site. Toggle features on or off and adjust settings as
        needed.
    </p>



    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">Homepage Style Configuration</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.style.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Homepage Style</label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="homepage_style" id="staticStyle" value="static" {{ $settings['homepage_style'] === 'static' ? 'checked' : '' }}>
                                <label class="form-check-label" for="staticStyle">Static</label>
                            </div>
                            <small class="form-text text-muted">A fixed homepage style that does not change.</small>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="homepage_style" id="dynamicStyle" value="dynamic" {{ $settings['homepage_style'] === 'dynamic' ? 'checked' : '' }}>
                                <label class="form-check-label" for="dynamicStyle">Dynamic</label>
                            </div>
                            <small class="form-text text-muted">Homepage style changes randomly on each visit.</small>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="homepage_style" id="timedStyle" value="timed" {{ $settings['homepage_style'] === 'timed' ? 'checked' : '' }}>
                                <label class="form-check-label" for="timedStyle">Timed Change</label>
                            </div>
                            <small class="form-text text-muted">Homepage style changes at specified intervals.</small>
                        </div>
                    </div>
                </div>
                <div class="mb-3" id="staticOptions" style="{{ $settings['homepage_style'] === 'static' ? '' : 'display: none;' }}">
                    <label for="static_homepage" class="form-label">Select Static Homepage</label>
                    <select class="form-select" id="static_homepage" name="static_homepage">
                        <option value="home1" {{ $settings['static_homepage'] === 'home1' ? 'selected' : '' }}>Homepage 1</option>
                        {{-- <option value="home2" {{ $settings['static_homepage'] === 'home2' ? 'selected' : '' }}>Homepage 2</option>
                        <option value="home3" {{ $settings['static_homepage'] === 'home3' ? 'selected' : '' }}>Homepage 3</option> --}}
                    </select>
                    <small class="form-text text-muted">Choose which static homepage to display.</small>
                </div>
                <div class="mb-3" id="timedOptions" style="{{ $settings['homepage_style'] === 'timed' ? '' : 'display: none;' }}">
                    <label for="change_interval" class="form-label">Change Interval</label>
                    <select class="form-select" id="change_interval" name="change_interval">
                        <option value="1_hour" {{ $settings['change_interval'] === '1_hour' ? 'selected' : '' }}>Every 1 Hour</option>
                        <option value="24_hours" {{ $settings['change_interval'] === '24_hours' ? 'selected' : '' }}>Every 24 Hours</option>
                        <option value="1_week" {{ $settings['change_interval'] === '1_week' ? 'selected' : '' }}>Every 1 Week</option>
                        <option value="1_month" {{ $settings['change_interval'] === '1_month' ? 'selected' : '' }}>Every 1 Month</option>
                    </select>
                    <small class="form-text text-muted">Set the frequency at which the homepage style changes.</small>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">HTTPS Enforcement Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.forceHttps') }}" method="POST" id="Foecehttps">
                @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="force_https" name="force_https"
                           value="1" {{ $settings['force_https'] ?? false ? 'checked' : '' }} onchange="document.getElementById('Foecehttps').submit();">
                    <label class="form-check-label" for="force_https">Force HTTPS</label>
                </div>
                <small class="form-text text-muted">
                    Enabling this option will force all traffic to use HTTPS, enhancing the security of your site.
                </small>
            </form>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">Email Confirmation Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.emailConfirm') }}" method="POST" id="emailConfirmationForm">
                @csrf
                <!-- Hidden input to ensure a value is sent when checkbox is unchecked -->
                <input type="hidden" name="email_confirmation" value="0">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="email_confirmation">
                        {{ $settings['email_confirmation'] ?? false ? 'Disable Email Confirmation' : 'Enable Email Confirmation' }}
                    </label>
                    <input class="form-check-input" type="checkbox" id="email_confirmation" name="email_confirmation"
                           value="1" {{ $settings['email_confirmation'] ?? false ? 'checked' : '' }}
                           onchange="document.getElementById('emailConfirmationForm').submit();">
                </div>
                <small class="form-text text-muted">
                    {{ $settings['email_confirmation'] ?? false ? 'Disabling this option allows users to register and access their account immediately without email verification, which might be suitable for internal or less formal environments.' : 'Enabling this option requires new users to verify their email address before they can access their account. This adds an additional layer of security by ensuring that the email address provided is valid and controlled by the user. When this setting is enabled, a verification email will be sent to the user\'s email address with a link they must click to verify their account.' }}
                </small>
            </form>
        </div>
    </div>


    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">Maintenance Mode Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.maintenance.update') }}" method="POST">
                @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="maintenance_mode" name="maintenance_mode"
                           value="1" {{ $settings['maintenance_mode'] === 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="maintenance_mode">Enable Maintenance Mode</label>

                </div>


                <small class="form-text text-muted">
                    When maintenance mode is enabled, all visitors to the site will be redirected to a maintenance page, preventing access to the site's content. This allows for safe updates and changes without public interruption.
                </small>


                <div class="mb-3">
                    <label for="maintenance_view_style" class="form-label">Maintenance View Style</label>
                    <select class="form-select" id="maintenance_view_style" name="maintenance_view_style">
                        <option value="1" {{ ($settings['maintenance_view_style'] ?? 'default_value') === '1' ? 'selected' : '' }}>Dark</option>
                        <option value="2" {{ ($settings['maintenance_view_style'] ?? '') === '2' ? 'selected' : '' }}>Gradient</option>
                        {{-- <option value="3" {{ ($settings['maintenance_view_style'] ?? '') === '3' ? 'selected' : '' }}>Style 3</option> --}}

                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="maintenance_access_code" class="form-label">Maintenance Access Code</label>
                    <input type="text" class="form-control" id="maintenance_access_code" name="maintenance_access_code"
                           value="{{ $settings['maintenance_access_code'] ?? '' }}" placeholder="Enter access code to bypass maintenance mode">
                    <small class="text-muted">
                        To bypass the maintenance mode and access the site normally, append <code>?access_code=YOUR_CODE</code> to the site’s URL. For example, if your access code is <code>{{ $settings['maintenance_access_code'] ?? '' }}</code>,<br> you would access the site via <code>{{ config('app.url') }}/?access_code={{ $settings['maintenance_access_code'] ?? '' }}</code>. <br>This feature is especially useful for administrators needing to view the site in its live state while under maintenance.
                    </small>
                    <small class="text-muted">
                        Ensure to keep the access code confidential as anyone with the code can bypass the maintenance restrictions.
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
        </div>
    </div>


    {{-- <div class="card">
        <div class="card-header">
            <h5 class="card-title">Test Configuration</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="test_config" class="form-label">Enable Test Configuration</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="test_config" name="test_config"
                            {{ $settings['test_config'] ?? false ? 'checked' : '' }}>
                        <label class="form-check-label" for="test_config">Toggle this switch to enable or disable the
                            test configuration.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <p class="text-muted">
                        This is a test configuration to demonstrate how to toggle site features. Enable this to see
                        changes reflected across the site.
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div> --}}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const styleRadios = document.querySelectorAll('input[name="homepage_style"]');
        const timedOptions = document.getElementById('timedOptions');
        const staticOptions = document.getElementById('staticOptions'); // Ensure this ID matches your HTML

        function toggleOptions() {
            const isTimed = document.getElementById('timedStyle').checked;
            const isStatic = document.getElementById('staticStyle').checked;

            timedOptions.style.display = isTimed ? '' : 'none'; // Show or hide timed options
            staticOptions.style.display = isStatic ? '' : 'none'; // Show or hide static options
        }

        styleRadios.forEach(radio => {
            radio.addEventListener('change', toggleOptions);
        });

        toggleOptions(); // Call on initial load to set the correct display
    });

</script>
@endsection

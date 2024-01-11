@extends('settings.layout')

@section('card')
    <h1 id="customization" class="list-heading">{{ trans('settings.pwa_pagetitle') }}</h1>
    <p class="text-muted">{{ trans('settings.pwa_desc') }}</p>

    <form action="{{ url("/settings/pwa") }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="section" value="pwa">

        <div class="setting-list">
            <div class="grid half gap-xl">
                <div>
                    <label for="setting-pwa-app-name" class="setting-list-label">{{ trans('settings.pwa_app_name') }}</label>
                    <p class="small">{{ trans('settings.pwa_app_name_desc') }}</p>
                </div>
                <div class="pt-xs">
                    @include('form.toggle-switch', [
                        'name' => 'setting-pwa-app-name-override',
                        'value' => setting('pwa-app-name-override'),
                        'label' => trans('settings.pwa_app_name_override'),
                    ])
                    <input type="text" value="{{ (setting('pwa-app-name-override') && setting('pwa-app-name')) ? setting('pwa-app-name') : setting('app-name') }}" id="setting-pwa-app-name" name='setting-pwa-app-name'>
                </div>
            </div>

            
        </div>




        <div class="form-group text-right">
            <button type="submit" class="button">{{ trans('settings.settings_save') }}</button>
        </div>
    </form>
@endsection

@section('after-content')
    @include('entities.selector-popup')
@endsection
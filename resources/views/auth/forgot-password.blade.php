<x-guest-layout>
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Recuperação de senha</h1>
                    <p class="signup-link">Digite seu e-mail e as instruções serão enviadas para você!</p>
                    <form class="text-left" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form">
                            <div id="email-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input id="email" type="text" value="" placeholder="Email" name="email">
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Resetar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="terms-conditions">© 2024 All Rights Reserved. <a href="index.html">{{ getenv('APP_NAME') }}</a>
                        <br>
                        <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="l-image">
        </div>
    </div>
</x-guest-layout>

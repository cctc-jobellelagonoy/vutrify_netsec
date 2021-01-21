<x-dynamic-component :component="'guest-layout'">
    <!-- Masthead-->
    <section class="masthead d-flex align-items-center justify-content-center">
        <div class="container col-md-6 align-items-center justify-content-center text-center">
            <div class="animate__animated animate__bounceInDown animate__fast">
                <h1 class="text-uppercase text-white font-weight-bold pb-3">Bullet Journal</h1>

                <p class="text-white-75 font-weight-light mb-5">
                    There are so many ways you can add power phrases to your bullet journal! Place one on a tracker page to keep you motivated.
                </p>
            </div>
            <a class="btn btn-primary btn-xl text-white animate__animated animate__bounceInUp animate__fast"
                href="{{ route('register') }}">Learn more</a>
        </div>
    </section>
</x-dynamic-component>

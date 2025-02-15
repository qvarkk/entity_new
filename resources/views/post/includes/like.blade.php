@auth()
    <form action="#" method="post">
        @csrf
        <button type="submit" class="border-0 bg-transparent shadow-none d-flex flex-column align-items-center"
                style="outline: none;">
            <i class="far fa-heart"
               style="color: #e34a40; font-size: 1.5rem;"></i>
            <span>0</span>
        </button>
    </form>
@endauth
@guest()
    <form action="{{ route('auth.login') }}">
        <button type="submit" class="border-0 bg-transparent shadow-none"
                style="outline: none;">
            <i class="far fa-heart" style="color: #e34a40; font-size: 1.5rem;"></i>
            <span>0</span>
        </button>
    </form>
@endguest

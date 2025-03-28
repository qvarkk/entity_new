<style>
    .animate-disappearance {
        animation-name: disappearance;
        animation-duration: 1000ms;
        animation-fill-mode: forwards;
    }

    @keyframes disappearance{
        0%{
            opacity: 1;
            transform: translateY(0);
        }
        100%{
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>

<!-- Notification disappear -->
<script defer>
    async function removeNotificationWithAnimation() {
        let notification = document.querySelector('#notification');
        notification.classList.add('animate-disappearance');
        setTimeout(() => { notification.style.display = 'none'; }, 1000);
    }
    setTimeout(removeNotificationWithAnimation, 2000);
</script>

@if(session()->has('notification'))
    <div
        style="
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 20px;
            border-radius: 15px;
            background-color: rgba(38,158,64,0.9);
            color: white;
            font-weight: bold;
            cursor: pointer;"
        id="notification"
        onclick="removeNotificationWithAnimation()"
    >
        {{ session('notification') }}
    </div>
@endif

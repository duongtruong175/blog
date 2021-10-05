<!-- Footer -->
<footer class="mx-auto lg:ml-56 bg-gray-300 h-24 flex">
    <div class="text-center m-auto">
        <p class="text-sm">Copyright © 2021 - 2022 - Tailwind CSS. All Rights Reserved</p>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>

<!-- Scripts open/close dropdown -->
<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>

<!-- Change rows data table -->
<script>
    $(document).ready(function() {
        // event on change select
        $("#paginate").on("change", function (e) {
            let length = $("#paginate").val();
            let url = window.location.protocol + "//" + window.location.host + window.location.pathname + "?length=" + length;
            window.location.href = url;
        });
    });
</script>

<!--Show confirm delete -->
<script>
    $(document).ready(function() {
        $(".confirmation-delete").click(function (e) {
            return confirm("Are you sure delete it and its relationships?");
        });
    });
</script>


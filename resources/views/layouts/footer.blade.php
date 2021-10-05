<!-- Footer -->
<footer class="bg-gray-300 h-24 flex">
    <div class="text-center m-auto">
        <p class="text-sm">Copyright © 2021 - 2022 - Tailwind CSS. All Rights Reserved</p>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>

<!-- Scripts to add comment -->
<script>
    $(document).ready(function() {
        // Listen event click button to submit form
        $("#form-add-comment").on('submit', function(e){
    
            e.preventDefault();

            $("#ul-errors").empty();

            let article_id = $("input[name=article_id]").val();
            let user_id = $("input[name=user_id]").val();
            let content = $("textarea[name=content]").val();

            $.ajax({
                url: "{{ route('comment.store') }}",
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "article_id": article_id,
                    "user_id": user_id,
                    "content": content
                },
                success: function(response){
                    $("textarea[name=content]").val('');
                    let user_name = response.user_name;
                    let time_created = response.time_created;
                    let content = response.content;
                    let div_comment = '<div class="mt-4 flex w-full">' +
                        '<div class="mr-2 pt-2 pl-2">' +
                            '<img class="w-8 h-8 rounded-full object-cover object-right" src="http://trichdanhay.vn/wp-content/uploads/2020/09/nhung-cau-noi-hay-cua-huan-hoa-hong.png" alt="">' +'' +
                        '</div>' +
                        '<div class="mx-2 bg-gray-100 w-full p-4 rounded">' +
                            '<div class="text-sm">' +
                                '<span class="font-bold">' + user_name + '</span>' +
                                '<!-- Display xx minutes/hours/days/months/years ago-->' +
                                '<span class="ml-8 text-gray-400">' + time_created + '</span>' +
                            '</div>' +
                            '<div class="pt-4">' +
                                content +
                            '</div>' +
                        '</div>' +
                    '</div>';
                    
                    if ($("#ul-comments-empty")) {
                        $("#ul-comments-empty").remove();
                    }
                    $("#ul-comments").prepend(div_comment);
                },
                error: function (response) {
                    let res = JSON.parse(response.responseText);
                    if(typeof res.errors.content !== 'undefined' && res.errors.content.length > 0) {
                        let errors = res.errors.content;
                        errors.forEach((error, index) => {
                            $("#ul-errors").append("<li class=\"py-1 px-2\">" + error + "</li>");
                        });
                    }
                }
            });
    
        });
    });
</script>

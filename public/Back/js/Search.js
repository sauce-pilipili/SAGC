function ajaxSearch(text) {
    $.ajax(
        {
            url: "",
            type: "GET",
            data: {
                'text': text,
            },
            success: function (data) {
                console.log(data.ok)
                $("#body-list").html(data.content);
            }
        }
    )
}
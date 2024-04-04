$(document).ready(function () {
    $("#addOptionButton").click(function () {
        var lastOption = $(".option:last");
        var lastOptionId = lastOption.data('option-id');

        var newOptionId = lastOptionId + 1;

        var newOption = lastOption.clone().attr('data-option-id', newOptionId);

        newOption.find('[name^="colors"]').each(function () {
            var oldName = $(this).attr('name');
            var newName = oldName.replace(/\[\d+\]/, '[' + newOptionId + ']');
            $(this).attr('name', newName);
        });

        newOption.find('input, select').val('');

        $(".options").append(newOption);
    });

    $(document).on("click", ".delete_btn_a", function (e) {
        e.preventDefault();
        $(this).closest('.option').remove();
    });

});

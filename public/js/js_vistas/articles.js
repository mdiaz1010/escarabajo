$(".select-tag").chosen({
    placeholder_text_multiple: "Seleccione un máximo de 3 tags",
    max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se encontraron estos tags'

});
$(".select-category").chosen({
    placeholder_text_single: "Seleccione una categoria"

});

$(" .textarea-content").trumbowyg();
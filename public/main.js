tinymce.init({
    selector: '#conte',
    language: 'es_MX',
    branding: false,
    menubar: false,
    height: 300,
    statusbar: false,

    // ESTA ES LA "LLAVE" PARA QUE SEA GRATIS
    license_key: 'gpl',

    // Esto permite que el editor cargue aunque no tengas cuenta en Tiny Cloud
    promotion: false,

    forced_root_block: 'p',
    plugins: 'image link lists',
    toolbar: 'undo redo | styles | bold italic forecolor | alignleft aligncenter alignright | bullist numlist | image',

    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});
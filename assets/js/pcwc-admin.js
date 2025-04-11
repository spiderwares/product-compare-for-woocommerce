jQuery(function ($) {
    class PCWC_ProductCompare {
        constructor() {
            this.index = $(".pcwc-input-group").length; // Get initial count
            this.init();
        }

        init() {
            this.eventHandlers();
            this.initColorPicker();
        }

        eventHandlers() {
            $(document.body).on("click", "#pcwc_add_field", this.addField.bind(this));
            $(document.body).on("click", ".pcwc-remove-field", this.removeField.bind(this));
            $(document.body).on( 'change', '.pcwc-switch-field input[type="checkbox"], select', this.toggleVisibility.bind(this) );
        }

        initColorPicker() {
            $(".pcwc-colorpicker").wpColorPicker({
                change: function (event, ui) {
                    $(this).siblings(".colorpickpreview").css("background-color", ui.color.toString());
                },
            });
        }

        addField(e) {
            e.preventDefault();

            $("#pcwc_req_input").append(`
                <div class="pcwc-input-group" style="margin-bottom: 10px;">
                    <input name="pcwc_compare_table[product_meta][${this.index}][label]" placeholder="Meta Label" type="text" style="margin-right: 10px;">
                    <input name="pcwc_compare_table[product_meta][${this.index}][key]" placeholder="Meta Key" type="text">
                    <button type="button" class="pcwc-remove-field button">Remove</button>
                </div>
            `);

            this.index++;
        }

        removeField(e) {
            e.preventDefault();
            $(e.currentTarget).closest(".pcwc-input-group").remove();
            this.updateIndexes();
        }

        updateIndexes() {
            $(".pcwc-input-group").each((i, el) => {
                $(el).find("input").each(function () {
                    let newName = $(this).attr("name").replace(/\[\d+\]/, `[${i}]`);
                    $(this).attr("name", newName);
                });
            });

            this.index = $(".pcwc-input-group").length;
        }

        toggleVisibility(e) {
            var __this = $(e.currentTarget);

            if (__this.is('select')) {
                var target      = __this.find(':selected').data('show'),
                    hideElemnt  = __this.data( 'hide' );
                    $(document.body).find(hideElemnt).hide();
                    $(document.body).find(target).show();
            } else {
                var target = __this.data('show');
                $(document.body).find(target).toggle();
            }
        }
    }

    new PCWC_ProductCompare();
});
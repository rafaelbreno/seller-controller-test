window.setErrors = function (data, inputs) {
    inputs.forEach((item, index) => {
        $(`input[id="${item}"]`)
            .removeClass('is-invalid')
            .removeClass('is-valid')
            .addClass('is-valid');
        $(`ul[id="${item}Errors"]`)
            .find('li')
            .remove()
    });
    Object.keys(data).forEach((inputId) => {
        let errorDiv = $(`ul[id="${inputId}Errors"]`);
        let input = $(`input[id="${inputId}"]`);
        errorDiv.find('li').remove();
        input.addClass('is-invalid').removeClass('is-valid');
        Object.keys(data[inputId]).forEach((errorPos) => {
            errorDiv.append($('<li>', {
                text: data[inputId][errorPos]
            }))
        });
    });
}

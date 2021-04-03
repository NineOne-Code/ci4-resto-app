 let input = [];
 let reviews, users, pay, bill;

$(function () {
    $('.btn-detail').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `home/detail`,
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data){
                reviews = data.reviews;
                users = data.users;
                $('.menu-title').html(data.name);
                $('.qty').attr('name', data.name);
                $('.qty').attr('id', id);
                $('.qty').val(0);
                $('.menu-image').attr('src', `img/${data.image}`);
                $('.menu-image').attr('alt', data.name);
                $('.menu-price').html(data.price);
                $('.menu-comment').html(`"${data.reviews[0].comment}"`);
                $('.menu-comment-name').html(`-${data.users[0].name}`);
                $('.total-price').html(0);
                if (input.find(data => data.id == id) !== undefined) {
                    const selected = input.find(data => data.id == id);
                    $('.qty').attr('value', selected.qty);
                    $('.qty').val(selected.qty);
                    $('.total-price').html(selected.total);
                }
            }
        });
    });
    $('.card-comment').on('click', function () {
        for (let i = 0; i < reviews.length; i++) {
            $('.list-reviews').append(
                `<div class="bg-light card-body mb-3">
                <p class="card-text">${reviews[i].comment}.</p>
                <p class="card-text text-end">@<strong class="text-muted fst-italic">${users[--reviews[i].user_id].name}</strong></p>
            </div>`
            );
        }
    });
    $('.btn-process').on('click', function () {
        $('.modal-title-process').html('Terimakasih telah memesan!')
        $('.modal-body-process').html(
            `<div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%"></div>
          </div>`
        )
        $('.btn-process').attr("disabled", true)
        $('.btn-process').html("sedang diproses")
        let width = 1;
        const interval = setInterval(() => {
            if (width >= 100) {
              clearInterval(interval);
              $('.btn-process').html("Selesai")
              $('.finish-modal-footer').html(
                  `<p class="text-end">Kembalian: $<strong class="bill-total text-dark">${pay - bill}</strong></p>`
              );
              generatePDF();
              window.location.href = 'http://localhost:8080/';
            } else {
              width++;
              document.querySelector('.progress-bar-animated').style.width = width + "%";
            }
          }, 10);
    });
    $('.btn-finish').on('click', function () {
        $.ajax({
            url: `home/total`,
            data: {data: input},
            method: 'post',
            dataType: 'json',
            success: function (data){
                let total = 0;
                for(let i = 0; i < data.length; i++) {
                    $('.bill-body').append(`<div class="alert alert-light border alert-dismissible fade show" role="alert">
                        <div class="d-flex justify-content-between">
                            <strong class="text-success">${data[i].name}</strong> <small class="text-secondary"><strong>@${data[i].price}</strong> X ${input[i].qty}</small>
                        </div>
                        <p class="text-end text-warning"><strong>$${input[i].total}</strong></p>
                        <a type="button" class="btn-close btn-delete-menu" data-id="${input[i].id}" onclick="handleCloseAlert(${input[i].id})" data-bs-dismiss="alert"></a>
                    </div>`);
                    total += +input[i].total;
                }
                $('.bill-total').html(total);
            }
        });
    });
})

function handleQTY() {
    const qty = document.querySelector('.qty').value;
    const id = document.querySelector('.qty').id;
    let total;
    const index = input.findIndex(data => data.id === id);
    if (input.find(data => data.id === id) !== undefined) {
        input[index].qty = qty;
        $('.total-price').html(+input[index].qty * +document.querySelector('.menu-price').innerHTML);
        total = document.querySelector('.total-price').innerHTML;
        input[index].total = total;
        if (input[index].total <= 0) {
            input.splice(index, 1);
            input.length > 0 ? $('.order-count').html( input.length ) : $('.order-count').empty();
            return
        }
        index != -1 && input[index].total > 0 && input.length > 0 ? $('.order-count').html( input.length ) : $('.order-count').empty();
    } else {
        $('.total-price').html(total = qty * +document.querySelector('.menu-price').innerHTML);
        input.push({ id, qty, total});
        $('.order-count').html( input.length )
        return
    }
}

function handleCloseAlert(id) {
    const index = input.findIndex(data => +data.id === id);
    input.splice(index, 1);
    input.length > 0 ? $('.order-count').html( input.length ) : $('.order-count').empty();
    let total = 0;
    for(let i = 0; i < input.length; i++) {
        total += +input[i].total;
    }
    $('.bill-total').html(total);
}

function beforeProcess() {
    pay = document.querySelector('.input-pay').value
    bill = +document.querySelector('.bill-total').innerHTML
    const btn = document.querySelector('.btn-process')
    pay >= bill ? btn.removeAttribute("disabled") : btn.setAttribute("disabled", true)
}

function generatePDF() {
    const doc = new jsPDF();
    doc.fromHTML($('#finishModal').html(), 10, 10, {
        width: 110
    })
    doc.save(`Nota-Pembelian-${Date.now()}.pdf`)
}
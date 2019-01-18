var domain = '';
function SetDomain(thisDomain) {
    domain = thisDomain;
}

function Search(category, brand, keyword) {
    var url = domain;
    if (category != '') {
        url += 'category/' + category + '&keyword=' + keyword;
    } else if (brand != '') {
        url += 'brand/' + brand  + '&keyword=' + keyword;
    }
    window.location = url;
}

function AddToCart(id, qty)
{
    $.ajax( {
        type: "POST",
        url: domain + "addCart.php",
        data: {
            id: id,
            qty: qty
        },
        success: function (response) {
            
        }, 
        error: function (jqXHR, exception) {
            console.log(jqXHR);
        }
    });
}
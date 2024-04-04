<div class="wrapperAdd">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Proizvodi</h1>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="input-group col-md-5 mt-3">
                                <input type="text" class="form-control" name="search" id="search-input-field" placeholder="Pretraga...">
                            </div>
                            <a href="/createProduct" id="inputSearch" class="btn btn-sm btn-primary">Dodavanje proizvoda</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Naziv</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cena
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Vrsta
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Opcije
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        getRows();

        $("#search-input-field").keyup(function () {
            getRows();
        });
    });

    $(document).on('click', '.delete-btn-action', function () {
        alert("test");
        $.get($(this).data("route"), function (result) {
            getRows();
        });
    });


    function getRows() {
        $("#table-body").empty();
        var data = {"search": $("#search-input-field").val(), "pageIndex": 0, "rowNumbers": 100 };
        $.get("/api/product/rows/json", data, function (result) {
            var jsonResult = JSON.parse(result);
            $.each(jsonResult.products, function (i, item) {
                $("#table-body").append(
                    "<tr>" +
                    "<td>" +
                    "<div class='d-flex px-2 py-1'>" +
                    "<div>" +
                    "<img src='assets/uploads/" + item.slika + "' class='avatar avatar-sm me-3' width='40px' height='30'>"+
                    "</div>" +
                    "<div class='d-flex flex-column justify-content-center'>" +
                    "<h6 class='mb-0 text-sm'>" + item.naziv + "</h6>" +
                    "</div>" +
                    "</div>" +
                    " </td>" +
                    "<td>" +
                    "<p class='mb-0 text-sm'>" + item.cena + "</p>" +
                    "</td>" +
                    "<td>" +
                    "<p class='mb-0 text-sm'>" + item.category + "</p>" +
                    "</td>" +
                    "<td class='align-middle'>" +
                    "<a href='/product/update?id=" + item.id + "'class='text-decoration-none text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>Edit</a>" +
                    " | <a href='javascript:;' data-route='/product/delete?id=" + item.id + "' class='text-decoration-none text-secondary font-weight-bold text-xs delete-btn-action' data-toggle='tooltip' data-original-title='Edit user'>Delete</a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        });
    }
</script>
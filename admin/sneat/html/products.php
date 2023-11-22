<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Product List";
$page = "products";
include "include/head.php";
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include "include/aside.php"; ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include "include/navbar.php"; ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">Product List</h4>
                        <!-- Product List Table -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Filter</h5>
                                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                    <div class="col-md-4 product_status"><select id="ProductStatus" class="form-select text-capitalize">
                                            <option value="">Status</option>
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="Publish">Publish</option>
                                            <option value="Inactive">Inactive</option>
                                        </select></div>
                                    <div class="col-md-4 product_category"><select id="ProductCategory" class="form-select text-capitalize">
                                            <option value="">Category</option>
                                            <option value="Household">Household</option>
                                            <option value="Office">Office</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Shoes">Shoes</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Game">Game</option>
                                        </select></div>
                                    <div class="col-md-4 product_stock"><select id="ProductStock" class="form-select text-capitalize">
                                            <option value=""> Stock </option>
                                            <option value="Out_of_Stock">Out of Stock</option>
                                            <option value="In_Stock">In Stock</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header d-flex border-top rounded-0 flex-wrap py-md-0">
                                        <div class="me-5 ms-n2 pe-5">
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search Product" aria-controls="DataTables_Table_0"></label></div>
                                        </div>
                                        <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                                            <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                                                <div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                                            <option value="8">8</option>
                                                            <option value="16">16</option>
                                                            <option value="24">24</option>
                                                            <option value="32">32</option>
                                                        </select></label></div>
                                                <div class="dt-buttons d-flex flex-wrap">
                                                    <button onclick="location.href='productAdd.php'" class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Product</span></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="datatables-products table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1391px;">
                                        <thead>
                                            <tr>
                                                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 434px;" aria-label="product: activate to sort column descending" aria-sort="ascending">product</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="category: activate to sort column ascending">category</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 60px;" aria-label="stock">stock</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px;" aria-label="price: activate to sort column ascending">price</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 39px;" aria-label="qty: activate to sort column ascending">qty</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103px;" aria-label="status: activate to sort column ascending">status</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 76px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="  control" tabindex="0" style="display: none;"></td>
                                                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center product-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="./Product List_files/product-9.png" alt="Product-9" class="rounded-2"></div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="text-body text-nowrap mb-0">Air Jordan</h6><small class="text-muted text-truncate d-none d-sm-block">Air Jordan is a line of basketball shoes produced by Nike</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2"><i class="bx bx-walk"></i></span>Shoes</span></td>
                                                <td><span>851</span></td>
                                                <td><span>31063</span></td>
                                                <td><span>$125</span></td>
                                                <td><span class="badge bg-label-danger" text-capitalized="">Inactive</span></td>
                                                <td>
                                                    <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="  control" tabindex="0" style="display: none;"></td>
                                                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center product-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="./Product List_files/product-13.png" alt="Product-13" class="rounded-2"></div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="text-body text-nowrap mb-0">Amazon Fire TV</h6><small class="text-muted text-truncate d-none d-sm-block">4K UHD smart TV, stream live TV without cable</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2"><i class="bx bx-mobile-alt"></i></span>Electronics</span></td>
                                                <td><span>851</span></td>
                                                <td><span>5829</span></td>
                                                <td><span>$263.49</span></td>
                                                <td><span class="badge bg-label-warning" text-capitalized="">Scheduled</span></td>
                                                <td>
                                                    <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="  control" tabindex="0" style="display: none;"></td>
                                                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center product-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="./Product List_files/product-15.png" alt="Product-15" class="rounded-2"></div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="text-body text-nowrap mb-0">Apple iPad</h6><small class="text-muted text-truncate d-none d-sm-block">10.2-inch Retina Display, 64GB</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2"><i class="bx bx-mobile-alt"></i></span>Electronics</span></td>
                                                <td><span>851</span></td>
                                                <td><span>35946</span></td>
                                                <td><span>$248.39</span></td>
                                                <td><span class="badge bg-label-success" text-capitalized="">Publish</span></td>
                                                <td>
                                                    <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="  control" tabindex="0" style="display: none;"></td>
                                                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-start align-items-center product-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="./Product List_files/product-5.png" alt="Product-5" class="rounded-2"></div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="text-body text-nowrap mb-0">Apple Watch Series 7</h6><small class="text-muted text-truncate d-none d-sm-block">Starlight Aluminum Case with Starlight Sport Band.</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-secondary me-2"><i class="bx bxs-watch"></i></span>Accessories</span></td>
                                                <td><span>851</span></td>
                                                <td><span>46658</span></td>
                                                <td><span>$799</span></td>
                                                <td><span class="badge bg-label-warning" text-capitalized="">Scheduled</span></td>
                                                <td>
                                                    <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row mx-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Displaying 1 to 7 of 100 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="0" class="page-link">…</a></li>
                                                    <li class="paginate_button page-item "><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="14" tabindex="0" class="page-link">15</a></li>
                                                    <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include "include/script.php"; ?>
</body>

</html>
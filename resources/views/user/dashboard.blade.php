@extends('user.layouts.app')

@section('content')
<div class="container mt-5">

	<div class="row">
@include('user.layouts.usersidebar')



 <div class="col-lg-9">
                <div class="row mb-3">
    <div class="col-lg-6">
        <div class="user-profile-details">
            <div class="account-info">
                <div class="header-area">
                    <h4 class="title">
                        Account Information
                    </h4>
                </div>
                <div class="edit-info-area"></div>
                <div class="main-info">
                    <h5 class="title">mehedi hassan</h5>
                    <ul class="list">
                        <li>
                            <p><span class="user-title">Email:</span> mehedihassan0031@gmail.com</p>
                        </li>
                                                                                                                                                                                                                            </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="user-profile-details h100">
            <div class="account-info wallet h100">
                <div class="header-area">
                    <h4 class="title">
                        My Wallet
                    </h4>
                </div>
                <div class="edit-info-area"></div>
                <div class="main-info">
                    <h3 class="title w-title">Affiliate Bonus: 0৳</h3>
                    <hr>
                    <h3 class="title w-title">Wallet Balance: 0৳</h3>
                    <a href="https://angobilash.com/user/deposit/create" class="mybtn1 sm">
                        <i class="fas fa-plus"></i> Add Deposit
                    </a>
                                                                                                                                        <hr>
                        <h3 class="title w-title">Bonus point : 0</h3>
                        
                                                                                                                    <small>You Don't have enough point to convart. You need 1 points more.</small>
                                                                                                            
<!-- Modal -->
<div class="modal fade" id="pointModal" tabindex="-1" aria-labelledby="pointModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <form method="post" action="https://angobilash.com/user/user_point/convert">
        <input type="hidden" name="_token" value="O4SvqcINzOJvQMlBlWZx6ogEqBRWLnUu3InXbJqn">                        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="point">Point</label>
                <select class="form-control" id="point" name="point">
                    <option value="">Select Point</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>
</div>
</div>

                                                    </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards-one mb-5">
    <div class="col-md-6 col-xl-6">
        <div class="card c-info-box-area">
            <div class="c-info-box box2">
                <p>0</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Total Orders</h6>
                <p class="text">All Time</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">
        <div class="card c-info-box-area">
            <div class="c-info-box box1">
                <p>0</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Pending Orders</h6>
                <p class="text">All Time</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="user-profile-details">
            <div class="account-info wallet">
                <div class="header-area">
                    <h4 class="title">
                        Recent Orders
                    </h4>
                </div>
                <div class="edit-info-area"> </div>
                <div class="main-info">
                    <div class="mr-table allproduct mt-4">
                        <div class="table-responsiv">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-hover dt-responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 86px;">#Order</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 62px;">Date</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131px;">Order Total</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 147px;">Order Status</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 64px;">View</th></tr>
                                </thead>
                                <tbody>
                                                                                     <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item next disabled" id="example_next"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
		</div>
	</div>


</div>
@endsection
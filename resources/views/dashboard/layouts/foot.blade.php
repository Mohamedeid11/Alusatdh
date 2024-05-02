<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/apps/user-management/users/view/add-schedule.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<!--end::Page Custom Javascript-->

<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/ecommerce/customers/listing/listing.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/ecommerce/customers/listing/add.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/ecommerce/customers/listing/export.js')}}"></script>
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/roles/view/view.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/roles/view/update-role.js')}}"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>

<!--end::Javascript-->
@yield('scripts')

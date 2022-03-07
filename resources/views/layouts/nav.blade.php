<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<a href="{{ url('/') }}">
				<img src="{{ asset('assets/images/epin-pay-logo.svg') }}" width="165">
			</a>
		</div>
		{{-- <div>
					<h4 class="logo-text">EPİNPAY CMS</h4>
				</div> --}}
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu mm-show" id="menu">
		<li>
			<a href="{{ url('/') }}">
				<div class="parent-icon"><i class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.home') }}</div>
			</a>
		</li>


		<li class="menu-label">{{ __('mainNav.dataManagment') }}</li>

		<li>
			<a href="{{ url('/companies') }}">
				<div class="parent-icon"><i class='bx bx-unlink'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.companies') }}</div>
			</a>
		</li>
		<li class="menu-label">{{ __('mainNav.actionManagment') }}</li>

		<li>
			<a href="{{ url('/payTransactions') }}">
				<div class="parent-icon"><i class='bx bx-dollar'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.paymentMethod') }}</div>
			</a>
		</li>
		<li>
			<a href="{{ url('/waitTransactions') }}">
				<div class="parent-icon"><i class='bx bx-pause-circle'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.waitMethod') }}</div>
			</a>
		</li>

		<li class="menu-label">{{ __('mainNav.reportsManagment') }}</li>
		{{-- <li>
					<a href="{{ url('/orders') }}">
		<div class="parent-icon"><i class='bx bx-cart'></i>
		</div>
		<div class="menu-title">{{ __('mainNav.orders') }}</div>
		</a>
		</li> --}}
		<li>
			<a href="{{ url('/teqpays') }}">
				<div class="parent-icon"><i class='bx bx-transfer-alt'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.teqpay') }}</div>
			</a>
		</li>

		<li>
			<a href="{{ url('/isbank') }}">
				<div class="parent-icon"><i class='bx bx-transfer-alt'></i>
				</div>
				<div class="menu-title">İş Bank</div>
			</a>
		</li>

		{{-- <li class="menu-label">{{ __('mainNav.settings') }}</li>
		<li>
			<a href="{{ url('/users') }}">
				<div class="parent-icon"><i class='bx bx-user'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.users') }}</div>
			</a>
		</li>
		<li>
			<a href="{{ url('/roles') }}">
				<div class="parent-icon"><i class='bx bx-cog'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.roles') }}</div>
			</a>
		</li>
		<li>
			<a href="{{ url('/permission') }}">
				<div class="parent-icon"><i class='bx bx-bug'></i>
				</div>
				<div class="menu-title">{{ __('mainNav.permissions') }}</div>
			</a>
		</li> --}}


	</ul>
	<!--end navigation-->
</div>
<!--end sidebar wrapper -->
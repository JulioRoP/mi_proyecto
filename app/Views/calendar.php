<?php
$session = session();
$name = $session->get('name');
$email = $session->get('email');
$idRol = $session->get('id_rol');

// Convertimos el ID del rol en un nombre legible
$roles = [
	1 => 'Administrador',
	2 => 'Visitante',
	3 => 'Moderador'
];

$roleName = $roles[$idRol] ?? 'Desconocido';
?>
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<base href="./">
	<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)--------------------------->
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->

	<!-- <link href="path/to/metronic/assets/css/style.bundle.css" rel="stylesheet"> -->

	<!-- FullCalendar CSS -->
	<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
	<style>
	.aside-logo {
    display: flex; /* Alinea los elementos horizontalmente */
    justify-content: flex-start; /* Alinea los elementos al principio */
    align-items: center; /* Alinea verticalmente el logo y el botón */
    padding-top: 50px; /* Ajusta el espacio superior */
    min-height: 100px; /* Asegura que el contenedor tenga suficiente altura */
}

.logo-custom {
    height: 200px; /* Ajusta el tamaño del logo */
    width: auto; /* Mantiene la proporción */
    margin-right: 0px; /* Acerca el logo al icono */
}

#kt_aside_toggle {
    display: flex; /* Centra el icono dentro del contenedor */
    justify-content: center; /* Alinea el icono horizontalmente */
    align-items: center; /* Alinea el icono verticalmente */
    padding: 15px; /* Aumenta el área del botón */
    cursor: pointer; /* Hace que el botón sea clickeable */
    font-size: 30px; /* Aumenta el tamaño del icono */
}

#kt_aside_toggle .svg-icon {
    width: 40px; /* Aumenta el tamaño del icono */
    height: 40px; /* Aumenta el tamaño del icono */
}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
				<!--begin::Brand-->
				<div class="aside-logo flex-column-auto" id="kt_aside_logo">
					<!--begin::Logo-->
					<a href="http://localhost/mi_proyecto/public/">
						<img alt="Logo" src="../assets/media/logos/logo-1-dark.png" class="logo-custom" />
					</a>
					<!--end::Logo-->
					
					<!--begin::Aside toggler (botón)-->
					<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
						<span class="svg-icon svg-icon-1 rotate-180">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
								<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Aside toggler-->
				</div>
				<!--end::Brand-->
				<!--begin::Aside menu-->
				<div class="aside-menu flex-column-fluid">
					<!--begin::Aside Menu-->
					<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
						<div class="container mt-5">
							<div class="card shadow-lg">
								<div class="card-body text-center">
									<h2>Bienvenido, <?= esc($name) ?>!</h2>
									<p><strong>Email:</strong> <?= esc($email) ?></p>
									<p><strong>Rol:</strong> <?= esc($roleName) ?></p> <!-- Muestra el rol -->
									<a href="<?= base_url('logout') ?>" class="btn btn-danger mt-3">Cerrar Sesión</a>
								</div>
							</div>
						</div>
						<!--begin::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

							<div class="menu-item">
								<div class="menu-content pt-8 pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">Piscifactoria</span>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
												<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Personas</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
									<div class="menu-item">
										<a class="menu-link" href="http://localhost/mi_proyecto/public/usuarios?NOMBRE_USUARIO=&EMAIL=&FECHA_REGISTRO=&ROL=&estado=activo">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Usuarios</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="http://localhost/mi_proyecto/public/proveedores?NOMBRE_PROVEEDOR=&TIPO_PRODUCTO=&TELEFONO=&EMAIL=&estado=activo">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Proveedores</span>
										</a>
									</div>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
										<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Earth.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<title>Stockholm-icons / Home / Earth</title>
											<desc>Created with Sketch.</desc>
											<defs/>
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9"/>
												<path d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z" fill="#000000" opacity="0.3"/>
											</g>
											</svg><!--end::Svg Icon-->
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Productos</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/pages/profile/projects.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pedidos</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="http://localhost/mi_proyecto/public/peces?ESPECIE=&FECHA_NACIMIENTO=&PESO=&LONGITUD=&TIPO_AGUA=&estado=activo">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Peces</span>
										</a>
									</div>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
										<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Saturation.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<title>Stockholm-icons / Design / Saturation</title>
											<desc>Created with Sketch.</desc>
											<defs/>
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M7,14 C7,16.7614237 9.23857625,19 12,19 C14.7614237,19 17,16.7614237 17,14 C17,12.3742163 15.3702913,9.86852817 12,6.69922982 C8.62970872,9.86852817 7,12.3742163 7,14 Z M12,21 C8.13400675,21 5,17.8659932 5,14 C5,11.4226712 7.33333333,8.08933783 12,4 C16.6666667,8.08933783 19,11.4226712 19,14 C19,17.8659932 15.8659932,21 12,21 Z" fill="#000000" fill-rule="nonzero"/>
												<path d="M12,4 C16.6666667,8.08933783 19,11.4226712 19,14 C19,17.8659932 15.8659932,21 12,21 L12,4 Z" fill="#000000"/>
											</g>
										</svg><!--end::Svg Icon--></span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Tanques</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
									<div class="menu-item">
										<a class="menu-link" href="http://localhost/mi_proyecto/public/tanques?CAPACIDAD=&LOCALIZACION=&TIPO_AGUA=&estado=activo">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Tanques</span>
										</a>
									</div>
								</div>
							</div>

						</div>
						<!--end::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
							<div class="menu-item">
								<div class="menu-content pt-8 pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">Eventos</span>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
								<span class="menu-link"> <!-- Agregar 'active' aquí -->
									<span class="menu-icon">
									<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Picture.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<title>Stockholm-icons / Home / Picture</title>
										<desc>Created with Sketch.</desc>
										<defs/>
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>
											<polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>
											<polygon fill="#000000" points="11 20 15.5 14 20 20"/>
											<circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>
										</g>
									</svg><!--end::Svg Icon--></span>
									</span>
									<span class="menu-title">Calendario</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg show">
									<div class="menu-item">
										<a class="menu-link active" href="http://localhost/mi_proyecto/public/calendar">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Calendario</span>
										</a>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside menu-->
			</div>
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar" style="top: 0px;">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Calendario</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="http://localhost/mi_proyecto/public/" class="text-muted text-hover-primary">Home</a>
										</li>
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<li class="breadcrumb-item text-dark">Calendario</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-1">
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
					</div>
						<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
							<div class="post d-flex flex-column-fluid" id="kt_post">
								<div id="kt_content_container" class="container-xxl">
									<!--begin::Row-->
									<div class="row gy-5 g-xl-8">
										<!--begin::Col-->

										<!--begin::Mixed Widget 2-->
										<div class="card card-xxl-stretch">
											<div class="container mt-5">
												<h2>Calendario Dinámico</h2>
												<div id="calendar"></div>
												
											</div><br>
										<!-- Modal para agregar evento -->
										<div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h5 class="modal-title" id="modalTitle">Agregar Evento</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>

													<!-- Modal Body -->
													<div class="modal-body">
														<!-- Formulario para agregar evento -->
														<div class="mb-3">
															<label for="eventTitle" class="form-label">Título del evento</label>
															<input type="text" class="form-control" id="eventTitle" placeholder="Ingrese el título del evento">
														</div>

														<div class="mb-3">
															<label for="eventDescription" class="form-label">Descripción</label>
															<textarea class="form-control" id="eventDescription" rows="3" placeholder="Ingrese la descripción del evento"></textarea>
														</div>

														<div class="mb-3">
															<label for="eventStart" class="form-label">Fecha de inicio</label>
															<input type="datetime-local" class="form-control" id="eventStart">
														</div>

														<div class="mb-3">
															<label for="eventEnd" class="form-label">Fecha de fin</label>
															<input type="datetime-local" class="form-control" id="eventEnd">
														</div>
													</div>

													<!-- Modal Footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
														<button type="button" class="btn btn-primary" id="saveEvent">Guardar evento</button>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal de confirmación de eliminación -->
										<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Confirmación de eliminación</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<p>¿Estás seguro de que deseas eliminar este evento?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" id="cancelDeleteEvent" data-bs-dismiss="modal">Cancelar</button>
														<button type="button" class="btn btn-danger" id="confirmDeleteEvent">Eliminar</button>
													</div>
												</div>
											</div>
										</div>

<!-- ------------------------------------------------------------------------------------- -->

											<!-- Metronic JS -->
											<!-- <script src="path/to/metronic/assets/js/scripts.bundle.js"></script> -->
											<script src="../assets/js/scripts.bundle.js"></script>
											<!-- FullCalendar JS -->
											<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
											<!-- jQuery -->
											<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
											

											<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
											<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
											<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script> dede-->

		

											<script>
												$(document).ready(function() {
													const calendarEl = document.getElementById('calendar');

													// Inicializar FullCalendar
													const calendar = new FullCalendar.Calendar(calendarEl, {
														locale: 'es',  // Configura el calendario en español
														initialView: 'dayGridMonth',
														selectable: true,
														editable: true,

														// Cargar eventos desde el servidor
														events: function(fetchInfo, successCallback, failureCallback) {
															$.ajax({
																url: "<?= base_url('/') ?>fetch-events",
																type: "GET",
																dataType: "json",
																success: function(data) {
																	let events = data.map(event => ({
																		id: event.PK_ID_EVENTO,
																		title: event.TITULO,
																		start: event.FECHA_INICIO,
																		end: event.FECHA_FIN
																	}));
																	successCallback(events);
																},
																error: function(xhr) {
																	console.error("Error al cargar eventos:", xhr.responseText);
																	failureCallback();
																}
															});
														},

														// Mostrar el modal para agregar un evento
														select: function(info) {
															// Limpiar los campos del modal
															$('#eventTitle').val('');
															$('#eventDescription').val('');

															// Formatear la fecha seleccionada
															let fechaSeleccionada = moment(info.start).format('YYYY-MM-DDTHH:mm');

															// Asignar solo la fecha de inicio y dejar la fecha de fin vacía
															$('#eventStart').val(fechaSeleccionada);
															$('#eventEnd').val(''); // Fecha de fin vacía para que el usuario la seleccione

															// Mostrar el modal
															$('#eventModal').modal('show');

															// Guardar evento
															$('#saveEvent').off('click').on('click', function() {
    const title = $('#eventTitle').val();
    const description = $('#eventDescription').val();
    const fechaInicio = $('#eventStart').val();
    const fechaFin = $('#eventEnd').val(); // Puede estar vacío

    // Verificar si la fecha de fin es anterior a la fecha de inicio
    if (fechaFin && moment(fechaFin).isBefore(moment(fechaInicio))) {
        Swal.fire({
            icon: 'warning',
            title: 'Fecha inválida',
            text: 'La fecha de fin no puede ser anterior a la fecha de inicio.',
            timer: 2000
        });
        return; // Detener la ejecución si la validación falla
    }

    if (title && description) {
        $.ajax({
            url: "<?= base_url('/') ?>add-event",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                TITULO: title,
                FECHA_INICIO: fechaInicio,
                FECHA_FIN: fechaFin || null, // Si está vacío, se envía como null
                DESCRIPCION_ES: description,
                DESCRIPCION_ENG: description
            }),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Evento Agregado',
                    text: 'El evento se ha agregado correctamente al calendario.',
                    timer: 2000
                });

                calendar.refetchEvents();
                $('#eventModal').modal('hide');
            },
            error: function(xhr) {
                console.error("Error al agregar evento:", xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al agregar el evento.',
                    timer: 2000
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Campos incompletos',
            text: 'Por favor, ingresa todos los datos del evento.',
            timer: 2000
        });
    }
});
														},
														eventDidMount: function(info) {
															$(info.el).tooltip({
																title: info.event.title, // Muestra el título completo en un tooltip
																placement: "top",
																trigger: "hover",
																container: "body"
															});
														},
														// Manejar la eliminación de un evento al hacer clic sobre él
														eventClick: function(info) {
															$('#deleteEventModal').modal('show');

															$('#confirmDeleteEvent').off('click').on('click', function() {
																$.ajax({
																	url: "<?= base_url('/') ?>delete-event/" + info.event.id,
																	type: "DELETE",
																	success: function(response) {
																		Swal.fire({
																			icon: 'success',
																			title: 'Evento Eliminado',
																			text: 'El evento ha sido eliminado correctamente.',
																			timer: 2000
																		});

																		info.event.remove();
																		$('#deleteEventModal').modal('hide');
																	},
																	error: function() {
																		Swal.fire({
																			icon: 'error',
																			title: 'Error',
																			text: 'Hubo un problema al eliminar el evento.',
																			timer: 2000
																		});
																	}
																});
															});

															$('#cancelDeleteEvent').off('click').on('click', function() {
																$('#deleteEventModal').modal('hide');
															});
														}
													});

													calendar.render();
												});
											
												

											</script>
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
	<!--end::Content-->
	<!--begin::Footer-->
	<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
		<!--begin::Container-->
		<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1">
				<span class="text-muted fw-bold me-1">2021©</span>
				<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
			</div>
			<!--end::Copyright-->
			<!--begin::Menu-->
			<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
				<li class="menu-item">
					<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
				</li>
				<li class="menu-item">
					<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
				</li>
				<li class="menu-item">
					<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
				</li>
			</ul>
			<!--end::Menu-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Footer-->
	</div>
	<!--end::Wrapper-->

	<!--en::Modal - Create App-->
	<!--begin::Modal - Upgrade plan-->
	<div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-xl">
			<!--begin::Modal content-->

			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<!--end::Modal - Upgrade plan-->
	<!--end::Modals-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Scrolltop-->
	<!--end::Main-->
	<script>
		var hostUrl = "../assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<script src="../assets/js/graficos.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="../assets/js/custom/widgets.js"></script>
	<script src="../assets/js/custom/apps/chat/chat.js"></script>
	<script src="../assets/js/custom/modals/create-app.js"></script>
	<script src="../assets/js/custom/modals/upgrade-plan.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
	<!-- Incluir Chart.js desde un CDN -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- libreria para los rgaficos -->
	<script>

	</script>


</body>
<!--end::Body-->

</html>
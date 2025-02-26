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
	<!-- <style>
    .fc-event {
    overflow: visible !important;
    white-space: normal !important;
    text-overflow: unset !important;
	}

	.fc-event:hover::after {
		content: attr(title);
		position: absolute;
		background: rgba(0, 0, 0, 0.8);
		color: #fff;
		padding: 5px;
		border-radius: 5px;
		font-size: 12px;
		white-space: nowrap;
		z-index: 100;
		transform: translateY(-100%);
	}
</style> -->
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
						<img alt="Logo" src="../assets/media/logos/logo-1-dark.svg" class="h-25px logo" />
					</a>
					<!--end::Logo-->
					<!--begin::Aside toggler-->
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
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>
								</div>
							</div>
							<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
								<span class="menu-link">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black" />
												<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
												<path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">Bases de datos</span>
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
										<a class="menu-link" href="http://localhost/mi_proyecto/public/peces?ESPECIE=&FECHA_NACIMIENTO=&PESO=&LONGITUD=&TIPO_AGUA=&estado=activo">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Peces</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="http://localhost/mi_proyecto/public/index.php/tanques">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Tanques</span>
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
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/pages/profile/projects.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Pedidos</span>
										</a>
									</div>

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
									<span class="menu-title">Account</span>
									<span class="menu-arrow"></span>
								</span>
								<div class="menu-sub menu-sub-accordion menu-active-bg">
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/overview.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Overview</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/settings.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Settings</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/security.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Security</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/billing.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Billing</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/statements.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Statements</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/referrals.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Referrals</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="../../demo1/dist/account/api-keys.html">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">API Keys</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside menu-->
			</div>
			<!--end::Aside-->


			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header-->

				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Toolbar-->

					<!--end::Toolbar-->
					<!--begin::Post-->
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
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										
										<!--end::Item-->
										<li class="breadcrumb-item text-dark">Calendario</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-1">
									<!--begin::Wrapper-->

									<!--end::Wrapper-->
									<!--begin::Button-->
									<!--end::Button-->

								</div>

							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->









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
											<!-- <div id="eventModal" style="display: none;">
												<div class="modal-content">
													<h4>Agregar Evento</h4>
													<label for="title">Título del evento:</label>
													<input type="text" id="eventTitle" placeholder="Título del evento" required>

													<label for="description">Descripción:</label>
													<textarea id="eventDescription" placeholder="Descripción del evento" required></textarea>

													<button id="saveEvent">Guardar evento</button>
													<button id="cancelEvent">Cancelar</button>
												</div>
											</div> -->


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
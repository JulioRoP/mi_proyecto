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
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
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
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside menu-->
				<!--begin::Footer-->
				
				<!--end::Footer-->
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
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Lista Usuarios</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Administrador</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Bases</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Lista Usuarios</li>
										<!--end::Item-->
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
								<!--end::Actions-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card header-->
									<div class="card-header border-0 pt-6">
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::buscador quitado-->

											<!--end::Search-->
										</div>
										<!--begin::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												<!--begin::Filter-->
												<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->Filtro</button>
												<!--begin::Menu 1-->
												<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
													<!--begin::Header-->
													<div class="px-7 py-5">
														<div class="fs-5 text-dark fw-bolder">Filtro Opciones</div>
													</div>
													<!--end::Header-->
													<!--begin::Separator-->
													<div class="separator border-gray-200"></div>
													<!--end::Separator-->
													<!--begin::Content-->
													<div class="px-7 py-5" data-kt-user-table-filter="form">
														<!--begin::Input group-->
														<div class="mb-10">

															<form method="GET" action="<?= base_url('usuarios') ?>" class="mb-3">
																<div class="container">
																	<!-- Campo Especie -->
																	<div class="mb-3">															
																		<input type="text" name="NOMBRE_USUARIO" class="form-control" placeholder="Nombre" value="<?= $nombreUsuarioBusqueda ?>">
																	</div>

																	<!-- Campo Fecha de Nacimiento -->
																	<div class="mb-3">
																		<input type="text" name="EMAIL" class="form-control" placeholder="Email" value="<?= isset($emailUsuarioBusqueda) ? $emailUsuarioBusqueda : '' ?>">
																	</div>

																	<!-- Campo Peso -->
																	<div class="mb-3">
																		<input type="date" step="any" name="FECHA_REGISTRO" class="form-control" placeholder="Fecha de Registro" value="<?= isset($fechaRegistroBusqueda) ? $fechaRegistroBusqueda : '' ?>">
																	</div>

																	<!-- Campo Longitud -->
																	<!-- Select para Rol -->
																	<div class="mb-3">
																		<select name="ROL" class="form-control">
																			<option value="" disabled selected>Selecciona el Rol</option>
																			<option value="1" <?= isset($rolUsuarioBusqueda) && $rolUsuarioBusqueda == '1' ? 'selected' : '' ?>>Administrador</option>
																			<option value="2" <?= isset($rolUsuarioBusqueda) && $rolUsuarioBusqueda == '2' ? 'selected' : '' ?>>Visitante</option>
																			<!-- Puedes añadir más opciones si tienes otros roles -->
																		</select>
																	</div>


																	<!-- Select para Estado -->
																	<div class="mb-3">
																		<select name="estado" class="form-control" onchange="this.form.submit()">
																			<option value="" disabled selected>Estado</option>
																			<option value="activo" <?= isset($estadoBusqueda) && $estadoBusqueda == 'activo' ? 'selected' : '' ?>>Activo</option>
																			<option value="baja" <?= isset($estadoBusqueda) && $estadoBusqueda == 'baja' ? 'selected' : '' ?>>De baja</option>
																			<option value="todos" <?= isset($estadoBusqueda) && $estadoBusqueda == 'todos' ? 'selected' : '' ?>>Todos</option>
																		</select>
																	</div>

																	<!-- Botón de Buscar -->
																	<div class="mb-3">
																		<button type="submit" class="btn btn-primary">Buscar</button>
																	</div>
																</div>
															</form>












														</div>

													</div>
													<!--end::Content-->
												</div>
												<!--end::Menu 1-->
												<!--end::Filter-->
												<!--begin::Export-->
												<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
													<span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
															<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
															<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
														</svg>
													</span>
													<!--end::Svg Icon-->Export</button>
												<!--end::Export-->
												<!--begin::Add user-->
												<a href="<?= base_url('usuarios/save') ?>"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
																<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->Añadir Usuario</button></a>

												<!--end::Add user-->
											</div>
											<!--end::Toolbar-->
											<!--begin::Group actions-->
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
												<div class="fw-bolder me-5">
													<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
												</div>
												<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
											</div>
											<!--end::Group actions-->
											<!--begin::Modal - Adjust Balance-->

											<!--end::Modal - New Card-->
											<!--begin::Modal - Add task-->

											<!--end::Modal - Add task-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<!--begin::Table head-->
											<thead>
												<!--begin::Table row-->
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-125px">Nombre</th>
													<th class="min-w-125px">Email</th>
													<th class="min-w-125px">Contraseña</th>
													<th class="min-w-125px">Fecha registro</th>
													<th class="min-w-125px">Rol</th>
													<th class="text-end min-w-100px">Acciones</th>
												</tr>
												<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold">
												<h1 class="text-center">Listado de Usuarios</h1><br><br>

												<?php if (session()->getFlashdata('success')): ?>
													<script>
														toastr.success('<?= session()->getFlashdata('success'); ?>');
													</script>
												<?php endif; ?>
												<?php if (!empty($usuarios) && is_array($usuarios)): ?>
													
													<?php foreach ($usuarios as $usuario): ?>
														<tr>
															<td>
														<!-- Si FECHA_BAJA no es NULL, se aplica la clase 'text-danger' para el color rojo -->
														<span class="<?= !is_null($usuario['FECHA_BAJA']) ? 'text-danger' : '' ?>">
																<?= esc($usuario['NOMBRE_USUARIO']) ?>
															</span>															</td>
															<td><?= esc($usuario['EMAIL']) ?></td>
															<td><?= substr($usuario['CONTRASEÑA_HASH'], 0, 10) . '...'; ?></td>
															<td><?= esc($usuario['FECHA_REGISTRO']) ?></td>
															<td><?= isset($usuario['NOMBRE_ROL']) ? esc($usuario['NOMBRE_ROL']) : 'Sin Rol' ?></td>
															<td class="text-end">
																<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Modificar
																	<span class="svg-icon svg-icon-5 m-0">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
																		</svg>
																	</span>
																</a>
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																	<div class="menu-item px-3">
																		<a href="<?= base_url('usuarios/save/' . $usuario['ID_USUARIO']) ?>" class="menu-link px-3">Editar</a>
																	</div>
																	<div class="menu-item px-3">
																		<a href="<?= base_url('usuarios/baja/' . esc($usuario['ID_USUARIO'])) ?>" class="menu-link px-3" onclick="return confirm('¿Estás seguro de dar de baja este usuario?');">Dar de baja</a>
																	</div>
																</div>
															</td>
														</tr>
													<?php endforeach; ?>
												<?php else: ?>
													<tr>
														<td colspan="6" class="text-center">No hay usuarios registrados.</td>
													</tr>
												<?php endif; ?>
											</tbody>



											<!--end::Table body-->
										</table>
										<!--end::Table-->

										<!-- -----------Paginación------------ -->
										<div class="mt-4">
											<?= $pager->links('default', 'custom_pagination') ?>
										</div>
									</div>

									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
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
	</div>
	<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--begin::Drawers-->
	<!--begin::Activities drawer-->

	<!--end::Activities drawer-->
	<!--begin::Chat drawer-->
	<!--end::Exolore drawer-->
	<!--end::Drawers-->
	<!--begin::Modals-->

	<!--end::Modal - Invite Friend-->

	<!--end::Modal - Create App-->
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
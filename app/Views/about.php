<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="page-header page-header-bg text-left" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); padding: 65px 0; border-bottom: 4px solid #1D5EB8;">
        <div class="container">
            <h1 class="text-white font-weight-bold mb-2" style="font-family: 'Urbanist', sans-serif; font-size: 2.8rem; font-weight: 800;">About Us</h1>
            <p class="text-info font-weight-semibold mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 1.2rem; letter-spacing: 0.6px; color: #93C5FD !important;">Kagzi Ventures &mdash; Practical Ideas. Better Living.</p>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-4" style="background: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
        <div class="container">
            <ol class="breadcrumb py-3 mb-0" style="background: transparent;">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" style="color: #1D5EB8; font-weight: 600;"><i class="icon-home mr-1"></i> Home</a></li>
                <li class="breadcrumb-item active text-dark font-weight-semibold" aria-current="page">About Us</li>
            </ol>
        </div>
    </nav>

    <div class="about-section pb-5">
        <div class="container">
            <!-- Welcome Section -->
            <div class="row align-items-center mb-5 pb-3">
                <div class="col-lg-7">
                    <span class="badge badge-primary px-3 py-2 text-uppercase mb-3 font-weight-bold d-inline-block" style="background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); color: #ffffff; font-size: 0.92rem; letter-spacing: 1px; border-radius: 20px; border: 1px solid #C5A059; box-shadow: 0 3px 10px rgba(29, 94, 184, 0.2);">
                        Indian Lifestyle Brand
                    </span>
                    <h2 class="subtitle font-weight-bold text-dark mb-3" style="font-family: 'Urbanist', sans-serif; font-size: 2.6rem; font-weight: 800; line-height: 1.25; color: #0F172A !important;">
                        Welcome to Kagzi Ventures
                    </h2>
                    <p class="lead font-weight-bold mb-4" style="font-family: 'Urbanist', sans-serif; font-size: 1.3rem; line-height: 1.6; color: #1D5EB8 !important;">
                        At <strong style="color: #0F172A; font-weight: 800;">Kagzi Ventures</strong>, we believe that everyday products should be <strong style="color: #0F172A; font-weight: 800;">practical, reliable, thoughtfully designed, and easy to use</strong>.
                    </p>
                    <p class="text-body" style="font-family: 'Albert Sans', sans-serif; font-size: 1.18rem; line-height: 1.85; color: #334155 !important; font-weight: 400;">
                        We are an Indian business focused on bringing useful and innovative products that make everyday life more organised, convenient, and beautiful. Our range includes <strong style="color: #0F172A; font-family: 'Urbanist', sans-serif; font-weight: 700;">storage solutions, transparent bags and pouches, hampers, utility products, and other thoughtfully selected products</strong> for homes, gifting, travel, businesses, and everyday needs.
                    </p>
                </div>

                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <div class="p-4 rounded shadow-lg position-relative overflow-hidden" style="background: linear-gradient(135deg, #FFFFFF 0%, #F0F4FA 100%); border: 2px solid #DBEAFE; border-radius: 16px !important; box-shadow: 0 10px 30px rgba(29, 94, 184, 0.12) !important;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #1D5EB8 0%, #C5A059 100%);"></div>
                        <div class="p-3 bg-white rounded shadow-sm d-inline-block mb-3 border" style="border-color: #E2E8F0 !important;">
                            <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Kagzi Ventures Logo" class="img-fluid" style="max-height: 110px; object-fit: contain;">
                        </div>
                        <h4 class="font-weight-bold mb-1" style="font-family: 'Urbanist', sans-serif; color: #1D5EB8; font-size: 1.6rem; font-weight: 800;">Kagzi Ventures</h4>
                        <div class="d-inline-block px-3 py-1 rounded-pill mt-1" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <p class="font-weight-bold mb-0" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.05rem;">Practical Ideas. Better Living.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Mission Card -->
            <div class="card text-white border-0 shadow-lg mb-5" style="border-radius: 16px; background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); border-bottom: 4px solid #C5A059; box-shadow: 0 12px 35px rgba(29, 94, 184, 0.25) !important;">
                <div class="card-body p-4 p-md-5">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center text-md-left mb-3 mb-md-0">
                            <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255, 255, 255, 0.15); border: 2px solid #C5A059; color: #ffffff;">
                                <i class="fa fa-bullseye" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white font-weight-bold mb-2" style="font-family: 'Urbanist', sans-serif; font-size: 2.1rem; font-weight: 800;">Our Mission</h3>
                            <p class="mb-2 text-white font-weight-bold" style="font-family: 'Urbanist', sans-serif; font-size: 1.3rem; line-height: 1.6;">
                                Our mission is simple &mdash; <span style="color: #FDE047;">to make everyday life easier with smart, functional products that offer both quality and value.</span>
                            </p>
                            <p class="mb-0 text-white-50" style="font-family: 'Albert Sans', sans-serif; font-size: 1.12rem; line-height: 1.75; font-weight: 300;">
                                We carefully focus on product functionality, material quality, usability, and presentation so that our customers receive products they can genuinely use and enjoy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Kagzi Ventures? (Cute & Decent Compact Cards) -->
            <div class="text-center mb-4">
                <span class="text-uppercase font-weight-bold" style="font-family: 'Urbanist', sans-serif; color: #1D5EB8; letter-spacing: 1px; font-size: 0.9rem;">Core Values</span>
                <h3 class="title font-weight-bold text-dark mt-1 mb-1" style="font-family: 'Urbanist', sans-serif; font-size: 2rem; font-weight: 800; color: #0F172A !important;">Why Kagzi Ventures?</h3>
                <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 1rem;">Designed for convenience, built for everyday utility.</p>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card h-100 border-0 p-3 text-center rounded-lg" style="border-radius: 12px; background: #ffffff; border: 1px solid #E2E8F0 !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#BFDBFE'; this.style.boxShadow='0 8px 20px rgba(29, 94, 184, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.03)';">
                        <div class="card-body p-2">
                            <div class="icon-box-shape text-white mx-auto mui-card-icon-gap d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #1D5EB8 0%, #154890 100%); box-shadow: 0 3px 10px rgba(29, 94, 184, 0.25);">
                                <i class="fa fa-magic" style="font-size: 20px;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark mui-card-title-gap" style="font-family: 'Urbanist', sans-serif; font-size: 1.15rem; font-weight: 800;">Practical Products</h5>
                            <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem; line-height: 1.55; color: #475569 !important;">We focus on products that solve real everyday problems.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card h-100 border-0 p-3 text-center rounded-lg" style="border-radius: 12px; background: #ffffff; border: 1px solid #E2E8F0 !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#A7F3D0'; this.style.boxShadow='0 8px 20px rgba(16, 185, 129, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.03)';">
                        <div class="card-body p-2">
                            <div class="icon-box-shape text-white mx-auto mui-card-icon-gap d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #10B981 0%, #059669 100%); box-shadow: 0 3px 10px rgba(16, 185, 129, 0.25);">
                                <i class="fa fa-check-circle" style="font-size: 20px;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark mui-card-title-gap" style="font-family: 'Urbanist', sans-serif; font-size: 1.15rem; font-weight: 800;">Quality &amp; Functionality</h5>
                            <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem; line-height: 1.55; color: #475569 !important;">We pay attention to materials, construction, usability, and finishing.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card h-100 border-0 p-3 text-center rounded-lg" style="border-radius: 12px; background: #ffffff; border: 1px solid #E2E8F0 !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#FDE68A'; this.style.boxShadow='0 8px 20px rgba(245, 158, 11, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.03)';">
                        <div class="card-body p-2">
                            <div class="icon-box-shape text-white mx-auto mui-card-icon-gap d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); box-shadow: 0 3px 10px rgba(245, 158, 11, 0.25);">
                                <i class="fa fa-lightbulb" style="font-size: 20px;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark mui-card-title-gap" style="font-family: 'Urbanist', sans-serif; font-size: 1.15rem; font-weight: 800;">Thoughtful Design</h5>
                            <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem; line-height: 1.55; color: #475569 !important;">Selected and developed with practicality and appearance in mind.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="card h-100 border-0 p-3 text-center rounded-lg" style="border-radius: 12px; background: #ffffff; border: 1px solid #E2E8F0 !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#C7D2FE'; this.style.boxShadow='0 8px 20px rgba(99, 102, 241, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.03)';">
                        <div class="card-body p-2">
                            <div class="icon-box-shape text-white mx-auto mui-card-icon-gap d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%); box-shadow: 0 3px 10px rgba(99, 102, 241, 0.25);">
                                <i class="fa fa-user-shield" style="font-size: 20px;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark mui-card-title-gap" style="font-family: 'Urbanist', sans-serif; font-size: 1.15rem; font-weight: 800;">Customer First</h5>
                            <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem; line-height: 1.55; color: #475569 !important;">We value every customer and aim to provide a smooth experience from enquiry to delivery.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="card h-100 border-0 p-3 text-center rounded-lg" style="border-radius: 12px; background: #ffffff; border: 1px solid #E2E8F0 !important; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.borderColor='#FBCFE8'; this.style.boxShadow='0 8px 20px rgba(236, 72, 153, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#E2E8F0'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.03)';">
                        <div class="card-body p-2">
                            <div class="icon-box-shape text-white mx-auto mui-card-icon-gap d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #EC4899 0%, #DB2777 100%); box-shadow: 0 3px 10px rgba(236, 72, 153, 0.25);">
                                <i class="fa fa-boxes" style="font-size: 20px;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark mui-card-title-gap" style="font-family: 'Urbanist', sans-serif; font-size: 1.15rem; font-weight: 800;">Retail &amp; Bulk Orders</h5>
                            <p class="text-muted mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem; line-height: 1.55; color: #475569 !important;">Available for home, business, gifting, retail, and custom bulk requirements.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Growing Together (Material UI Compact & Neat Surface) -->
            <div class="mui-card-surface text-center mb-4 mx-auto position-relative overflow-hidden" style="max-width: 860px; padding: 24px 32px;">
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #1D5EB8 0%, #C5A059 50%, #154890 100%);"></div>
                
                <h4 class="mb-2" style="font-size: 1.4rem; color: #0F172A;">Growing Together</h4>
                
                <p class="mb-2" style="font-size: 0.98rem; line-height: 1.6; max-width: 760px; margin-left: auto; margin-right: auto;">
                    Kagzi Ventures is a growing Indian brand, and every order helps us move one step closer to our vision of creating a trusted name in <strong style="color: #0F172A; font-weight: 700;">utility, storage, gifting, and everyday lifestyle products</strong>. We are continuously exploring new ideas, products, and solutions to bring more value to our customers.
                </p>
                
                <p class="font-weight-bold mb-3" style="color: #1D5EB8; font-size: 1.05rem;">
                    Thank you for choosing Kagzi Ventures.
                </p>

                <div class="mui-chip mui-chip-primary">
                    Kagzi Ventures &mdash; Practical Ideas. Better Living.
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="page-header page-header-bg text-left" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 60px 0;">
        <div class="container">
            <h1 class="text-white font-weight-bold mb-1" style="font-size: 2.5rem;">About Us</h1>
            <p class="text-info font-weight-semibold mb-0" style="font-size: 1.1rem; letter-spacing: 0.5px;">Kagzi Ventures — Practical Ideas. Better Living.</p>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>"><i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>
    </nav>

    <div class="about-section pb-5">
        <div class="container">
            <!-- Welcome Section -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-7">
                    <span class="badge badge-primary px-3 py-2 text-uppercase mb-3 font-weight-bold" style="letter-spacing: 1px;">Indian Lifestyle Brand</span>
                    <h2 class="subtitle font-weight-bold text-dark mb-3" style="font-size: 2.2rem; line-height: 1.2;">Welcome to Kagzi Ventures</h2>
                    <p class="lead text-dark font-weight-medium mb-3" style="line-height: 1.6;">
                        At <strong>Kagzi Ventures</strong>, we believe that everyday products should be <strong>practical, reliable, thoughtfully designed, and easy to use</strong>.
                    </p>
                    <p class="text-body" style="font-size: 1rem; line-height: 1.7;">
                        We are an Indian business focused on bringing useful and innovative products that make everyday life more organised, convenient, and beautiful. Our range includes <strong>storage solutions, transparent bags and pouches, hampers, utility products, and other thoughtfully selected products</strong> for homes, gifting, travel, businesses, and everyday needs.
                    </p>
                </div>
                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <div class="p-4 bg-light rounded shadow-sm border border-primary">
                        <img src="<?= base_url('assets/images/logo-kagzi.jpeg') ?>" alt="Kagzi Ventures Logo" class="img-fluid rounded mb-3" style="max-height: 100px; object-fit: contain;">
                        <h4 class="font-weight-bold text-primary mb-1">Kagzi Ventures</h4>
                        <p class="text-muted small mb-0">Practical Ideas. Better Living.</p>
                    </div>
                </div>
            </div>

            <!-- Our Mission Card -->
            <div class="card bg-primary text-white border-0 shadow-lg mb-5" style="border-radius: 12px; background: linear-gradient(135deg, #0088cc 0%, #005580 100%);">
                <div class="card-body p-4 p-md-5">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center text-md-left mb-3 mb-md-0">
                            <i class="fa fa-bullseye" style="font-size: 3.5rem; opacity: 0.9;"></i>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white font-weight-bold mb-2" style="font-size: 1.8rem;">Our Mission</h3>
                            <p class="mb-0 text-white font-weight-medium" style="font-size: 1.15rem; line-height: 1.6;">
                                Our mission is simple — <strong>to make everyday life easier with smart, functional products that offer both quality and value.</strong>
                            </p>
                            <p class="mb-0 text-white-50 mt-2" style="font-size: 0.95rem;">
                                We carefully focus on product functionality, material quality, usability, and presentation so that our customers receive products they can genuinely use and enjoy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Kagzi Ventures? -->
            <div class="text-center mb-4">
                <h2 class="title font-weight-bold text-dark mb-2" style="font-size: 2rem;">Why Kagzi Ventures?</h2>
                <p class="text-muted">Designed for convenience, built for everyday utility.</p>
            </div>

            <div class="row mb-5">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center" style="border-radius: 10px; background: #f8fafc; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="card-body">
                            <div class="icon-box-shape bg-primary text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="fa fa-magic" style="font-size: 24px;"></i>
                            </div>
                            <h4 class="font-weight-bold text-dark mb-2">Practical Products</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">We focus on products that solve real everyday problems.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center" style="border-radius: 10px; background: #f8fafc; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="card-body">
                            <div class="icon-box-shape bg-primary text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="fa fa-check-circle" style="font-size: 24px;"></i>
                            </div>
                            <h4 class="font-weight-bold text-dark mb-2">Quality &amp; Functionality</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">We pay attention to materials, construction, usability, and finishing.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center" style="border-radius: 10px; background: #f8fafc; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="card-body">
                            <div class="icon-box-shape bg-primary text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="fa fa-lightbulb" style="font-size: 24px;"></i>
                            </div>
                            <h4 class="font-weight-bold text-dark mb-2">Thoughtful Design</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Our products are selected and developed with both practicality and appearance in mind.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center" style="border-radius: 10px; background: #f8fafc; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="card-body">
                            <div class="icon-box-shape bg-primary text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="fa fa-user-shield" style="font-size: 24px;"></i>
                            </div>
                            <h4 class="font-weight-bold text-dark mb-2">Customer First</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">We value every customer and aim to provide a smooth experience from enquiry to delivery.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-3 text-center" style="border-radius: 10px; background: #f8fafc; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="card-body">
                            <div class="icon-box-shape bg-primary text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="fa fa-boxes" style="font-size: 24px;"></i>
                            </div>
                            <h4 class="font-weight-bold text-dark mb-2">Retail &amp; Bulk Orders</h4>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Whether you need a product for your home or require larger quantities for your business, gifting, retail, or other requirements, we are happy to serve you.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Growing Together -->
            <div class="bg-light p-4 p-md-5 rounded text-center shadow-sm border border-secondary mb-4">
                <h3 class="font-weight-bold text-dark mb-3" style="font-size: 1.8rem;">Growing Together</h3>
                <p class="lead text-body max-w-700 mx-auto mb-3" style="font-size: 1.05rem; line-height: 1.7;">
                    Kagzi Ventures is a growing Indian brand, and every order helps us move one step closer to our vision of creating a trusted name in <strong>utility, storage, gifting, and everyday lifestyle products</strong>.
                </p>
                <p class="text-muted mb-4">
                    We are continuously exploring new ideas, products, and solutions to bring more value to our customers.
                </p>
                <h4 class="font-weight-bold text-primary mb-2">Thank you for choosing Kagzi Ventures.</h4>
                <div class="badge badge-dark px-4 py-2 text-uppercase font-weight-bold mt-2" style="font-size: 1rem; letter-spacing: 1px;">
                    Kagzi Ventures — Practical Ideas. Better Living.
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

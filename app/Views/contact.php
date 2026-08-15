<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="page-header page-header-bg text-left" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 60px 0;">
        <div class="container">
            <h1 class="text-white font-weight-bold mb-1" style="font-size: 2.5rem;">Contact Us</h1>
            <p class="text-info font-weight-semibold mb-0" style="font-size: 1.1rem; letter-spacing: 0.5px;">Get in touch with Kagzi Ventures</p>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>"><i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h2 class="subtitle font-weight-bold text-dark mb-3">Get In Touch</h2>
                <p class="text-body mb-4">Have questions about our products, bulk orders, or retail inquiries? Send us a message and we'll respond promptly.</p>

                <div class="contact-info-list mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box-shape bg-primary text-white mr-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; border-radius: 50%;">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold text-dark">Address</h6>
                            <p class="mb-0 text-muted">822 Flat No.7 Khatiwala Tank Indore 452014</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box-shape bg-primary text-white mr-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; border-radius: 50%;">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold text-dark">Phone</h6>
                            <p class="mb-0 text-muted"><a href="tel:+919753875213" class="text-dark font-weight-semibold">+91 9753875213</a></p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box-shape bg-primary text-white mr-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; border-radius: 50%;">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold text-dark">Email</h6>
                            <p class="mb-0 text-muted"><a href="mailto:info@kagziventures.com" class="text-dark font-weight-semibold">info@kagziventures.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 12px; background: #f8fafc;">
                    <h3 class="font-weight-bold text-dark mb-1">Send Us a Message</h3>
                    <p class="text-muted small mb-3"><i class="fab fa-whatsapp text-success mr-1"></i> Form responses are sent directly to our WhatsApp support line (+91 9753875213)</p>
                    
                    <form id="whatsappContactForm" action="<?= base_url('contact/send') ?>" method="post" target="_blank">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="cName" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark">Your Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="cEmail" class="form-control" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark">Your Phone Number</label>
                            <input type="tel" name="phone" id="cPhone" class="form-control" placeholder="Enter your mobile number">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-dark">Subject</label>
                            <input type="text" name="subject" id="cSubject" class="form-control" placeholder="Retail order / Bulk inquiry">
                        </div>
                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="cMessage" class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block font-weight-bold py-2" style="background-color: #25D366; border-color: #25D366; font-size: 1.05rem;">
                            <i class="fab fa-whatsapp mr-2" style="font-size: 1.2rem;"></i> Send Enquiry on WhatsApp
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('whatsappContactForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            var name = document.getElementById('cName').value.trim();
            var email = document.getElementById('cEmail').value.trim();
            var phone = document.getElementById('cPhone').value.trim();
            var subject = document.getElementById('cSubject').value.trim() || 'General Enquiry';
            var message = document.getElementById('cMessage').value.trim();

            var text = "*New Enquiry - Kagzi Ventures*\n\n" +
                       "*Name:* " + name + "\n" +
                       "*Email:* " + email + "\n" +
                       (phone ? "*Phone:* " + phone + "\n" : "") +
                       "*Subject:* " + subject + "\n\n" +
                       "*Message:*\n" + message;

            var waUrl = "https://wa.me/919753875213?text=" + encodeURIComponent(text);
            window.open(waUrl, '_blank');
        });
    }
});
</script>
<?= $this->endSection() ?>

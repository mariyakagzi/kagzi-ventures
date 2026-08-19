<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="main">
    <div class="page-header page-header-bg text-left" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); padding: 65px 0; border-bottom: 4px solid #1D5EB8;">
        <div class="container">
            <h1 class="text-white font-weight-bold mb-2" style="font-family: 'Urbanist', sans-serif; font-size: 2.8rem; font-weight: 800;">Terms &amp; Conditions</h1>
            <p class="text-info font-weight-semibold mb-0" style="font-family: 'Albert Sans', sans-serif; font-size: 1.15rem; letter-spacing: 0.4px; color: #93C5FD !important;">Please read these terms carefully before using our Website</p>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-4" style="background: #F8FAFC; border-bottom: 1px solid #E2E8F0;">
        <div class="container">
            <ol class="breadcrumb py-3 mb-0" style="background: transparent;">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" style="color: #1D5EB8; font-weight: 600;"><i class="icon-home mr-1"></i> Home</a></li>
                <li class="breadcrumb-item active text-dark font-weight-semibold" aria-current="page">Terms &amp; Conditions</li>
            </ol>
        </div>
    </nav>

    <div class="legal-page-section pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 14px; border-top: 4px solid #1D5EB8 !important;">

                        <p class="text-muted mb-4" style="font-family: 'Albert Sans', sans-serif; font-size: 0.95rem;">
                            <strong>Effective Date:</strong> <?= date('d F Y') ?>
                        </p>

                        <div style="font-family: 'Albert Sans', sans-serif; font-size: 1.05rem; line-height: 1.8; color: #334155;">

                            <p>
                                These Terms &amp; Conditions ("Terms") govern your access to and use of the website
                                <strong><?= esc(parse_url(base_url(), PHP_URL_HOST) ?: 'kagziventures.in') ?></strong>
                                (the "Website") operated by Kagzi Ventures ("we", "us", "our"), located at Khatiwala Tank,
                                Indore, Madhya Pradesh, India. By accessing or using our Website, you agree to be bound by
                                these Terms. If you do not agree with any part of these Terms, please do not use our Website.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">1. About Kagzi Ventures</h3>
                            <p>
                                Kagzi Ventures is an Indian brand offering storage solutions, bags, pouches, hampers, gifting
                                items, and other lifestyle and utility products. Our Website serves as an online catalogue
                                showcasing our products. At present, orders and enquiries are placed directly with our team via
                                WhatsApp, phone, or email, and are confirmed manually &mdash; the Website does not process online
                                payments.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">2. Use of the Website</h3>
                            <p>You agree to use our Website only for lawful purposes and in a manner that does not infringe the rights of, or restrict or inhibit the use of, this Website by any third party. Prohibited behaviour includes, but is not limited to:</p>
                            <ul class="pl-4">
                                <li>Attempting to gain unauthorised access to any part of the Website or its related systems;</li>
                                <li>Uploading or transmitting viruses, malware, or any other harmful code;</li>
                                <li>Copying, reproducing, or distributing Website content without our prior written consent;</li>
                                <li>Using the Website in any way that could damage, disable, or impair its functioning.</li>
                            </ul>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">3. Product Information &amp; Pricing</h3>
                            <p>
                                We make every effort to display accurate product descriptions, images, and prices. However,
                                product images are for representation purposes and actual products may vary slightly in
                                colour, size, or design. Prices, offers, and product availability are subject to change
                                without prior notice and are confirmed at the time of enquiry or order.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">4. Orders &amp; Enquiries</h3>
                            <p>
                                When you submit an enquiry through our Website, WhatsApp, or email, this constitutes a request
                                for information or an offer to purchase, not a confirmed order. All orders are subject to
                                acceptance, availability, and confirmation by our team, including agreement on pricing,
                                quantity, payment, and delivery terms communicated directly to you.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">5. Intellectual Property</h3>
                            <p>
                                All content on this Website, including but not limited to text, graphics, logos, images, and
                                the Kagzi Ventures name and brand mark, is the property of Kagzi Ventures and is protected by
                                applicable intellectual property laws. You may not use, reproduce, or distribute any content
                                from this Website without our prior written permission.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">6. Third-Party Links &amp; Services</h3>
                            <p>
                                Our Website may contain links to third-party platforms such as WhatsApp, Instagram, and
                                Facebook for your convenience. We do not control and are not responsible for the content,
                                policies, or practices of any third-party websites or services.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">7. Limitation of Liability</h3>
                            <p>
                                To the fullest extent permitted by applicable law, Kagzi Ventures shall not be liable for any
                                indirect, incidental, special, or consequential damages arising out of or in connection with
                                your use of the Website or products purchased from us. Nothing in these Terms shall exclude or
                                limit liability that cannot be excluded or limited under Indian law.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">8. Indemnification</h3>
                            <p>
                                You agree to indemnify and hold harmless Kagzi Ventures, its team, and affiliates from any
                                claims, losses, damages, liabilities, and expenses arising out of your misuse of the Website
                                or violation of these Terms.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">9. Changes to These Terms</h3>
                            <p>
                                We may revise these Terms from time to time. Updated Terms will be posted on this page with a
                                revised "Effective Date". Your continued use of the Website after any changes constitutes
                                acceptance of the revised Terms.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">10. Governing Law &amp; Jurisdiction</h3>
                            <p>
                                These Terms shall be governed by and construed in accordance with the laws of India. Any
                                disputes arising out of or in connection with these Terms shall be subject to the exclusive
                                jurisdiction of the courts at Indore, Madhya Pradesh, India.
                            </p>

                            <h3 class="font-weight-bold mt-5 mb-3" style="font-family: 'Urbanist', sans-serif; color: #0F172A; font-size: 1.4rem;">11. Contact Us</h3>
                            <p>For any questions regarding these Terms, please contact us:</p>
                            <div class="p-3 rounded mb-2" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                <p class="mb-1"><strong>Kagzi Ventures</strong></p>
                                <p class="mb-1">822, Flat No. 7, Khatiwala Tank, Indore, Madhya Pradesh 452014, India</p>
                                <p class="mb-1">Email: <a href="mailto:info@kagziventures.in" style="color: #1D5EB8;">info@kagziventures.in</a></p>
                                <p class="mb-0">Phone / WhatsApp: <a href="https://wa.me/919753875213" style="color: #1D5EB8;">+91 97538 75213</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>

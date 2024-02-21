<?php
require_once('identifier.php');
require_once('connexiondb.php');

$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
?>
<style>
    body {
        font-family: Roboto;
        margin: 0 auto;
    }

    .certificate-container {
        padding: 50px;
        width: 1024px;
    }

    .certificate {
        border: 20px solid #0C5280;
        padding: 25px;
        height: 600px;
        position: relative;
    }

    .certificate:after {
        content: '';
        top: 0px;
        left: 0px;
        bottom: 0px;
        right: 0px;
        position: absolute;
        background-size: 100%;
        z-index: -1;
    }

    .certificate-header>.logo {
        width: 80px;
        height: 80px;
    }

    .certificate-title {
        text-align: center;
    }

    .certificate-body {
        text-align: center;
    }

    h1 {

        font-weight: 400;
        font-size: 48px;
        color: #0C5280;
    }

    .student-name {
        font-size: 24px;
    }

    .certificate-content {
        margin: 0 auto;
        width: 750px;
    }

    .about-certificate {
        width: 380px;
        margin: 0 auto;
    }

    .topic-description {

        text-align: center;
    }
</style>
<div class="certificate-container">
    <div class="certificate">
        <div class="water-mark-overlay"></div>

        <div class="certificate-body">

            <p class="certificate-title"><strong>RENR NCLEX AND CONTINUING EDUCATION (CME) Review Masters</strong></p>
            <h1>ِشهادة نجاح مؤقتة</h1>
            <p class="student-name">

                <?php echo $nom
                ?>
            </p>
            <div class="certificate-content">
                <div class="about-certificate">
                    <p>
                        has completed [hours] hours on topic title here online on Date [Date of Completion]
                    </p>
                </div>
                <p class="topic-title">
                    The Topic consists of [hours] Continuity hours and includes the following:
                </p>
                <div class="text-center">
                    <p class="topic-description text-muted">Contract adminitrator - Types of claim - Claim Strategy - Delay analysis - Thepreliminaries to a claim - The essential elements to a successful claim - Responses - Claim preparation and presentation </p>
                </div>
            </div>
            <div class="certificate-footer text-muted">
                <div class="row">
                    <div class="col-md-6">
                        <p>Principal: ______________________</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    Accredited by
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    Endorsed by
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button id="downloadBtn">Download PDF</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        const certificateContainer = document.querySelector('.certificate');

        // Convert the certificate container to PDF
        html2pdf().from(certificateContainer).save('certificate.pdf');
    });
</script>
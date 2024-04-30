<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate</title>
    <style>
      body {
        font-family: Roboto;
        margin: 0;
        padding: 0;
      }

      .certificate-container {
        padding: 50px;
        width: 1024px;
        margin: 0 auto; /* Center the container */
      }
      .certificate {
        border: 20px solid #018749;
        padding: 25px;
        height: 600px;
        position: relative;
      }

      .certificate:after {
        content: "";
        top: 0px;
        left: 30px;
        bottom: 0px;
        right: 0px;
        position: absolute;
        background-image: url(images/forcert.png);
        background-size: 100%;
        z-index: -1;
        opacity: 0.1;
      }

      .certificate-header > .logo {
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
        color: #0c5280;
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
  </head>
  <body>
    <div class="certificate-container">
      <div class="certificate">
        <div class="water-mark-overlay"></div>
        <div class="certificate-header">
        <img src="images/Management1.png"
                    style="width: 250px;">
                  
                
        </div>
        <div class="certificate-body">
       
          <h1>Certificate of Scholarship</h1>
          <p style="font-size: 15px;">
                This is to certify that
              </p>
          <p class="student-name">John Carlo Moral</p>
          <div class="certificate-content">
           
            
            <div class="text-center">
              <p class="topic-description text-muted">
              As city scholar, he/she is entitled to a scholarship grant not exceeding <b><u>TWO
THOUSAND PESOS</u> <p style="font-size: 20px;">(P2,000.00)</p></b> for stipend for the 2nd Term of S.Y. 2023 - 2024.
              </p>
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
                    <p>Accredited by</p>
                  </div>
                  <div class="col-md-6">
                    <p>Endorsed by</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

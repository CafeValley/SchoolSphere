<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <font size='3'>
                <?php echo strtoupper($CLIENT_NAME); ?> <br>
            
                <br>
                P.O. Box 114 - Khartoum (Sudan) <br>
                <br>
                
                Emails:cck.secondary@gmail.com <br>
                <?php spacing(11);?>:cck.primary@gmail.com

            </font>
        </div>
        <div class="col-4 text-center">
            <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <image href="logo.jpg" height="200" width="200" />
            </svg>
            <br><br>

            <h2><strong><?php echo $formnameheaderforprint; ?></strong></h2>
            <br>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-left  text-align:right;">
            <style>
                p.date {
                    text-align: right;
                }
            </style>

            <p class="date">
                <font size='4'>
                    كليه كمبوني الخرطوم
                    <br>
                    
                    ص ب : 114 - الخرطوم (السودان)
                    <br>
                    <br>

                    <br><br>
                    School Year: <?php echo $Acadyear; ?>
                </font>
            </p>
        </div>
    </div>
</header>
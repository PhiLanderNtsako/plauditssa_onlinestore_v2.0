<?php
	session_start();
    include 'inc/config.php';
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Plaudits SA</title>
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- main css -->
    <link rel="stylesheet" href="css/lightslider.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body> 
    <?php
        include 'header.php';
    ?>
    <div class="long-text-container">
        <h2>Privacy Policy</h2>
        <span class="border-bottom"></span>
        <p>
        Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from www.plauditssa.co.za (the “Site”).<br><br>

        <strong>Personal information we collect</strong><br><br>

        When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site and information about how you interact with the Site. We refer to this automatically-collected information as “Device Information”.<br><br>

        We collect Device Information using the following technologies:<br>
        – “Cookies” are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit http://www.allaboutcookies.org.<br>
        – “Log files” track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.<br><br>

        – “Web beacons”, “tags”, and “pixels” are electronic files used to record information about how you browse the Site.<br><br>

        Additionally, when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, email address, and phone number. We refer to this information as “Order Information”. Note that we do not collect or save your credit card details.<br><br>

        When we talk about “Personal Information” in this Privacy Policy, we are talking both about Device Information and Order Information.<br><br>

        <strong>How do we use your personal information?</strong><br>
        We use the Order Information that we collect generally to fulfil any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:<br>
        – Communicate with you;<br>
        – Screen our orders for potential risk or fraud; and<br>
        – When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.<br><br>

        We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimise our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).<br><br>

        Sharing your Personal Information We share your Personal Information with third parties to help us use your Personal Information, as described above. We use Google Analytics to help us understand how our customers use the Site — you can read more about how Google uses your Personal Information here: https://www.google.com/intl/en/policies/privacy/. You can also opt-out of Google Analytics here: https://tools.google.com/dlpage/gaoptout.<br><br>

        Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful requests for information we receive, or to otherwise protect our rights.<br><br>

        <strong>Behavioural advertising</strong><br><br>

        As described above, we use your Personal Information to provide you with targeted advertisements or marketing communications we believe may be of interest to you. For more information about how targeted advertising works, you can visit the Network Advertising Initiative’s (“NAI”) educational page at http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.<br><br>

        You can opt-out of targeted advertising by using the links below: – Facebook: https://www.facebook.com/settings/?tab=ads – Google: https://www.google.com/settings/ads/anonymous – Bing: https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads<br><br>

        Additionally, you can opt-out of some of these services by visiting the Digital Advertising Alliance’s opt-out portal at http://optout.aboutads.info/.<br><br>

        <strong>Do not track</strong><br><br>

        Please note that we do not alter our Site’s data collection and use practices when we see a Do Not Track signal from your browser.<br><br>

        <strong>Your rights</strong><br><br>

        If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through the contact information below.<br><br>

        Additionally, if you are a European resident we note that we are processing your information in order to fulfil contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above. Additionally, please note that your information will be transferred outside of Europe, including Canada and the United States.<br><br>

        <strong>Data retention</strong><br>
        When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.<br><br>

        <strong>Changes</strong><br>
        We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal, or regulatory reasons.<br><br>

        <strong>Minors</strong><br><br>

        The Site is intended for individuals of all ages.<br><br>

        <strong>Contact us</strong><br><br>

        For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at info@plauditssa.co.za

    </p>
</div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js" ></script>
    <script>
        // Product Slider
        $(document).ready(function() {
            $('#cover-slides').lightSlider({
                autoWidth:true,
                speed: 5000, //ms'
                auto: true,
                loop: true,
                slideEndAnimation: true,
                pause: 3000,
                controls: true,
                onSliderLoad: function() {
                    $('#cover-slides').removeClass('cs-hidden');
                } 
            });  
        });
    </script>
</body>
</html>
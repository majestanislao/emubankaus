<?php
	session_start();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" href="./css/faqs.css" rel="stylesheet"/>
	<title>Frequently Asked Questions</title>
<?php
	include 'header.php';	
?>
</head>
<body>
    <h1>Frequently Asked Questions</h1>
    <div class="accordion">
        <div>
            <input type="checkbox" name="FAQs" id="Question7" class="accordion-input">
            <label for="Question7" class="accordion-label">I forgot my password, there is no option to reset password. How I can reset my password?</label>
            <div class="accordion-content">
                <p>For security reasons, only Bank IT department can reset the customer password. 
				Please contact bank with valid authentication document to reset your password</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question8" class="accordion-input">
            <label for="Question8" class="accordion-label">I am a new customer and upon login it says no account exists. What should I do?</label>
            <div class="accordion-content">
                <p>For all the new customers, bank create a standard savings account within 2-5 business days. If your account is not created by that time, Please contact bank </p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question9" class="accordion-input">
            <label for="Question9" class="accordion-label">I cannot edit my personal details in account detail page. How can I edit my personal details?</label>
            <div class="accordion-content">
               <p>For security reasons, only Bank adminstrator can edit customer details. 
				Please contact bank with and request the Bank admin to amend your personal details</p>
            </div>
        </div>
		<div>
            <input type="checkbox" name="FAQs" id="Question1" class="accordion-input">
            <label for="Question1" class="accordion-label">I want to open a new account. What type of identification do I have to present to the bank?</label>
            <div class="accordion-content">
                <p>Banks are required by law to have a Customer Identification Program for the creation of new accounts. A new account may include, but is not limited to, a deposit account, an extension of credit, or the rental of a safe deposit box.

                    The minimum information that a bank must obtain when opening a new account includes:
                    
                    Name,
                    Date of birth (for an individual),
                    Address, and
                    Identification number 
                    The bank must then verify the accuracy of the information via a review of documents such as a driver's license or passport. Or it can verify the information by comparing the information you provided with information from a credit-reporting agency or by checking prior bank references.</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question2" class="accordion-input">
            <label for="Question2" class="accordion-label">I opened a new checking account, but the bank will not let me withdraw my funds immediately.</label>
            <div class="accordion-content">
                <p>The Expedited Funds Availability Act has special provisions for new account holders. When the bank is dealing with a new customer, it can hold some deposits longer before making the funds available for withdrawal.

                    An account is considered new for the first 30 calendar days after it was created.
                    
                    The account would not be defined as new if:
                    
                    Each of the customers on the account had within the preceding 30 calendar days another established account at the bank; and
                    That established account was opened for at least 30 calendar days.
                    Different banks have different funds availability policy schedules when it comes to new accounts.
                    
                    Cash, wire transfers, and ACH credit transfers generally have next business day availability.
                    Official government checks (Treasury checks, state and local government checks) up to $5,000 also have next-day availability. However, the amount in excess of $5,000 might not be available until the ninth business day following the banking day on which the funds are deposited.
                    Each bank may establish its own policy for on-us checks (drawn on the bank), and local checks, as these do not have a specific business day availability for new accounts.
                    You may want to review the Account Agreement you received when you opened the account. It should contain details on the availability schedule.</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question3" class="accordion-input">
            <label for="Question3" class="accordion-label">Every time I apply for a loan, the bank turns me down. Can you make the bank give me a loan?</label>
            <div class="accordion-content">
                <p>No. The OCC does not make individual credit decisions.

                    We encourage national banks and federal savings associations (collectively, banks) to make prudent loans to sound borrowers, but we cannot require banks to extend credit to individuals or businesses.</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question4" class="accordion-input">
            <label for="Question4" class="accordion-label">My ATM/debit card has been lost/stolen. What should I do?</label>
            <div class="accordion-content">
                <p>You should notify the bank within two business days after learning of the loss or theft of your access device (ATM/debit card). If you do, your liability will be the lesser of the following:

                    $50 or
                    the amount of unauthorized transfers that occur before the financial institution receives notice.
                    However, if you fail to notify the bank within two business days, your liability could be as high as $500.</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question5" class="accordion-input">
            <label for="Question5" class="accordion-label">Money was wired from my account to another party, but that party did not receive the money. What can I do?</label>
            <div class="accordion-content">
                <p>Notify the bank so that it can investigate your claim. If you first contact the bank by phone, be sure to follow up in writing.</p>
            </div>
        </div>
        <div>
            <input type="checkbox" name="FAQs" id="Question6" class="accordion-input">
            <label for="Question6" class="accordion-label">What is the cut-off time for deposits?</label>
            <div class="accordion-content">
                <p>Banks may establish different cut-off hours for different types of deposits, as well as for deposits made at different locations. Generally, the cut-off hour may not be earlier than 2:00PM for deposits made at the bank itself, and not earlier than noon for deposits at offsite locations such as ATMs.

             </p>
            </div>
        </div>
    </div>
<?php
	include 'footer.php';
?>
</body>
</html>
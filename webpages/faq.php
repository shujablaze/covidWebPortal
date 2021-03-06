<?php
include "../components/navbar.php";
?>

<section class="sidebar">
    <div class="sidebar__heading faqcol">FAQ</div>
    <ul class="sidebar__list">
        <li>Bring your Adhaar Card For Verification</li>
        <li class="darken_purp">Vaccines are Completely Safe and Thoroughly Tested</li>
        <li>Do Not Believe in News From Unverified Sources</li>
        <li class="darken_purp">Get Vaccines from Verified Sources</li>
        <li>Beware of Middlemen and Dalals</li>
    </ul>
    <div class="sidebar__btns">
        <a href="about.php" class="btn btn-secondary">learn more</a>
        <a href="register.php" class="btn btn-primary">Register</a>
    </div>
</section>

<section class="main">
<h1>Frequently Asked Questions</h1>
    <div class="faq-container">
        <div class="faq active">
            <h3 class="faq-title">               	
              Why is vaccination important?
            </h3>

            <p class="faq-text">
                Vaccination helps to prevent diseases and save lives. When we get vaccinated, we aren’t just protecting ourselves, but also those around us. During the COVID-19 pandemic, vaccination continues to be critically important. Therfore we ensure that essential immunization and health services continue, despite the challenges posed by COVID-19.
            </p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">                             	
               Does the Covid-19 vaccine provide long term protection?
            </h3>

            <p class="faq-text">
                It is too early to know the duration of protection of the Covid-19 vaccine since this vaccine has been recently developed. Although the available data suggests that most people who recover from COVID-19 develop an immune response that provides at least some period of protection against reinfection.
            </p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title"> Will other vaccines help protect me from Covid-19?
            </h3>

            <p class="faq-text">Currently, there is no evidence that any other vaccines, apart from those specifically designed for the SARS-Cov-2 virus,  will protect against COVID-19.
            </p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">What are the benefits of getting vaccinated?</h3>

            <p class="faq-text">The COVID-19 vaccines produce protection against the disease, as a result of developing an immune response to the SARS-Cov-2 virus.  Developing immunity through vaccination means there is a reduced risk of developing the  illness and its consequences. This immunity helps you fight the virus if exposed. Getting vaccinated may also protect people around you, because if you are protected from getting infected and from disease, you are less likely to infect someone else.</p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title"> Who can take the Covid-19 vaccine?</h3>

            <p class="faq-text">
                <ul class="faq-text">
                <li>People with a history of severe allergic reaction to any component of the vaccine should not take it.</li>
                <li>Children above 16 years of age.</li>
                <li>People with known medical conditions</li>
                <li>People who have or had COVID-19 already</li>            
            </ul>
            </p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">How safe and effective is the vaccine? </h3>

            <p class="faq-text">This vaccine is considered safe; due to the effective passage of the vaccine testing stages, its strong immune response and persistent antibodies. The side effects of the vaccine are mostly minor and temporary(injection site reaction, mild fever, or headache).</p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">What is the method of taking the vaccine and the number of its doses?</h3>

            <p class="faq-text">The vaccine is given by injection into a muscle, where two doses of the vaccine are received three weeks apart.</p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title"> Do you have to wear a mask after Covid vaccine?</h3>

            <p class="faq-text">After you've been fully vaccinated against COVID-19, you should keep taking precautions in public places like wearing a mask, staying 6 feet apart from others, and avoiding crowds and poorly ventilated spaces until we know more.</p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">Who else may be turned away or asked to delay their vaccine?</h3>

            <p class="faq-text">
                <ul class="faq-text">
                    <li>
                     Patients with chronic diseases like diabetes and hypertension will be vaccinated, but only if the disease is under control.</li>
                    <li> A chronic diabetic taking medication must keep their sugar levels under control to get the vaccine</li>
                    <li>If an individual's blood pressure is higher than 140/90, then they will be advised to avoid vaccination.</li>
                    <li>If someone has a severe allergy to medicines, antibiotics or previous vaccines, then doctors will likely not administer the vaccine.</li>            
                </ul>
            </p>

            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>


</section>
<script>
const toggles = document.querySelectorAll('.faq-toggle')
toggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        toggle.parentNode.classList.toggle('active')
    })
});
</script>

<?php
include "../components/footer.php";
?>
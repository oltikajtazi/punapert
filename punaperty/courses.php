<?php include('inc/header.php'); ?>

<div class="container mt-5" style="max-width: 900px;">
  <div class="text-center mb-5">
    <h2 class="fw-bold">🎓 Kurse Falas për Zhvillim Profesional</h2>
    <p class="text-muted">Zgjidh një kurs për të rritur aftësitë dhe shanset tuaja për punësim.</p>
  </div>

  <div class="row g-4">
    <?php
    $courses = [
        [
            'title' => 'Bazat e Programimit me PHP',
            'description' => 'Mësoni si të ndërtoni faqe dinamike me PHP dhe MySQL.',
            'short' => 'Mësoni bazat e programimit në PHP dhe krijoni faqe dinamike.',
            'modules' => [
                'Hyrje në PHP dhe server-side programming',
                'Struktura të dhënash dhe variabla',
                'Kontrolli i rrjedhës dhe funksione',
                'Punë me forma dhe të dhëna nga përdoruesi',
                'Ndërveprimi me bazën e të dhënave MySQL'
            ],
            'link' => '#'
        ],
        [
            'title' => 'Dizajn Grafik me Canva',
            'description' => 'Krijoni materiale vizuale profesionale pa përvojë të mëparshme.',
            'short' => 'Krijoni dizajne të bukura dhe profesionale lehtësisht me Canva.',
            'modules' => [
                'Hyrje në Canva dhe ndërfaqja e përdoruesit',
                'Krijimi i postimeve sociale dhe fletushkave',
                'Përdorimi i temave dhe elementëve grafikë',
                'Krijimi i logove dhe identitetit vizual',
                'Rishikimi dhe eksportimi i projekteve'
            ],
            'link' => '#'
        ],
        [
            'title' => 'Marketing Digjital për Fillestarë',
            'description' => 'Zbuloni strategjitë e marketingut në rrjetet sociale dhe Google.',
            'short' => 'Filloni marketingun online dhe rrisni praninë tuaj në rrjetet sociale.',
            'modules' => [
                'Bazat e marketingut digjital',
                'Marketing në Facebook dhe Instagram',
                'SEO dhe marketing me Google Ads',
                'Analitika dhe matjet e fushatave',
                'Strategjitë për rritje dhe angazhim'
            ],
            'link' => '#'
        ],
        [
            'title' => 'Zhvillimi i Web-it me HTML & CSS',
            'description' => 'Ndërtoni uebfaqe nga zero duke përdorur teknologjitë bazë të front-end.',
            'short' => 'Mësoni HTML dhe CSS për të ndërtuar uebfaqe moderne.',
            'modules' => [
                'Struktura bazë HTML',
                'Stilimi me CSS',
                'Layout me Flexbox dhe Grid',
                'Responsiviteti dhe dizajn mobil',
                'Publikimi i faqeve në internet'
            ],
            'link' => '#'
        ],
        [
            'title' => 'Menaxhimi i Projekteve',
            'description' => 'Mësoni si të planifikoni dhe menaxhoni projekte efektivisht.',
            'short' => 'Zhvilloni aftësi për planifikim dhe organizim projektesh të suksesshme.',
            'modules' => [
                'Hyrje në menaxhimin e projekteve',
                'Planifikimi dhe përcaktimi i qëllimeve',
                'Përdorimi i mjeteve dhe softuerëve',
                'Menaxhimi i riskut dhe burimeve',
                'Vlerësimi dhe raportimi i projektit'
            ],
            'link' => '#'
        ]
    ];

    foreach ($courses as $index => $course): ?>
      <div class="col-md-6">
        <div class="card shadow-sm rounded-4 h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $course['title']; ?></h5>
            <p class="card-text text-muted flex-grow-1"><?php echo $course['short']; ?></p>

            <!-- Modules list (hidden by default) -->
            <ul class="list-group list-group-flush mb-3 modules-list" style="display: none;">
              <?php foreach ($course['modules'] as $module): ?>
                <li class="list-group-item py-1 small"><?php echo htmlspecialchars($module); ?></li>
              <?php endforeach; ?>
            </ul>

            <button type="button" class="btn btn-primary rounded-pill mt-auto toggle-modules-btn" data-target="modules-<?php echo $index; ?>">
              Shiko Kursin
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select all buttons with the class 'toggle-modules-btn'
    document.querySelectorAll('.toggle-modules-btn').forEach(function(button) {
      button.addEventListener('click', function() {
        // Find the sibling modules list
        const cardBody = this.closest('.card-body');
        const modulesList = cardBody.querySelector('.modules-list');

        if (modulesList.style.display === 'none' || modulesList.style.display === '') {
          modulesList.style.display = 'block';
          this.textContent = 'Fshih Modulet'; // Change button text to "Hide Modules"
        } else {
          modulesList.style.display = 'none';
          this.textContent = 'Shiko Kursin'; // Change back button text
        }
      });
    });
  });
</script>

<?php include('inc/footer.php'); ?>

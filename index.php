<?php
$conn = new mysqli("localhost", "root", "", "contact");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS information (
    name TEXT NOT NULL,
    email MEDIUMTEXT NOT NULL,
    subject TEXT NOT NULL,
    message LONGTEXT NOT NULL
)";
$conn->query($table_sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO information (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
      die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {

    } else {
      echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
  } else {

  }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prashant Shrestha</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body class="min-h-screen bg-white select-none">
  <!-- Navigation -->
  <nav class="fixed w-full bg-white z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <a href="#home" class="text-black font-bold text-xl cursor-pointer">PS.</a>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <a href="#home" class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">Home</a>
          <a href="#about"
            class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">About</a>
          <a href="#skills"
            class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">Skills</a>
          <a href="#education"
            class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">Education</a>
          <a href="#projects"
            class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">Projects</a>
          <a href="#contact"
            class="text-sm font-medium text-black/60 hover:text-black transition-colors nav-link">Contact</a>
        </div>

        <!-- Mobile Navigation Button -->
        <div class="md:hidden flex items-center">
          <button id="menuButton" class="text-black">
            <i id="menuIcon" data-lucide="menu"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-black">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="#home"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">Home</a>
        <a href="#about"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">About</a>
        <a href="#skills"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">Skills</a>
        <a href="#education"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">Education</a>
        <a href="#projects"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">Projects</a>
        <a href="#contact"
          class="block w-full px-3 py-2 text-base font-medium text-black hover:bg-black hover:text-white">Contact</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="min-h-screen flex items-center justify-center pt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 id="myName" class="text-4xl md:text-6xl font-bold text-black mb-6">
        Prashant Shrestha
      </h1>
      <p class="text-lg md:text-xl text-black/60 mb-8 max-w-2xl mx-auto">
        A passionate 19-year-old full-stack developer and student, dedicated
        to crafting elegant solutions through code. Specializing in modern web
        technologies and user-centric design.
      </p>
      <div class="flex justify-center space-x-4">
        <a href="#projects"
          class="inline-flex items-center px-6 py-3 border-2 border-black text-black hover:bg-black hover:text-white transition-colors">
          View Projects
          <i data-lucide="chevron-down" class="ml-2 w-5 h-5"></i>
        </a>
        <a href="#contact"
          class="inline-flex items-center px-6 py-3 bg-black text-white border-2 border-black hover:text-black hover:bg-white hover:border-black/90 transition-colors">
          Get in Touch
          <i data-lucide="mail" class="ml-2 w-5 h-5"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-12">About Me</h2>
      <div class="grid md:grid-cols-2 gap-12">
        <div>
          <p class="text-lg leading-relaxed mb-6">
            I'm a student and developer with a deep passion for creating
            meaningful digital experiences. My journey in technology began at
            age 17 when I first discovered web development, and since then,
            I've been on an exciting path of continuous learning and growth.
          </p>
          <p class="text-lg leading-relaxed mb-6">
            Currently pursuing Bachelors in Computer Application, I balance my
            academic studies with practical project work. I'm particularly
            interested in full-stack development, with a focus on creating
            scalable and user-friendly applications.
          </p>
          <p class="text-lg leading-relaxed">
            When I'm not coding, you'll find me:
          </p>
          <ul class="mt-4 space-y-2 text-white/60">
            <li class="flex items-center">
              <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
              Reading tech blogs and documentation
            </li>
            <li class="flex items-center">
              <i data-lucide="users" class="w-5 h-5 mr-3"></i>
              Contributing to open-source projects
            </li>
            <li class="flex items-center">
              <i data-lucide="coffee" class="w-5 h-5 mr-3"></i>
              Exploring new technologies
            </li>
          </ul>
        </div>
        <div class="relative">
          <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&auto=format&fit=crop&q=80"
            alt="Coding Environment" class="w-full h-[400px] object-cover" />
          <div class="absolute inset-0 bg-black/10"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section id="skills" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-12">Skills & Expertise</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Frontend Development -->
        <div class="border-2 border-black p-6">
          <div class="flex items-center mb-4">
            <i data-lucide="layout" class="w-6 h-6 mr-3"></i>
            <h3 class="text-xl font-bold">Frontend Development</h3>
          </div>
          <ul class="space-y-3 cursor-default">
            <li class="flex items-center justify-between">
              <span>HTML & CSS</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[90%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>JavaScript</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[50%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>React</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[1%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>Tailwind CSS</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[40%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>TypeScript</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[1%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>Next.js</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[1%]"></div>
              </div>
            </li>

            <li class="flex items-center justify-between">
              <span>SASS/SCSS</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[30%]"></div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Tools & Others -->
        <div class="border-2 border-black p-6">
          <div class="flex items-center mb-4">
            <i data-lucide="tool" class="w-6 h-6 mr-3"></i>
            <h3 class="text-xl font-bold">Tools & Others</h3>
          </div>
          <ul class="space-y-3">
            <li class="flex items-center justify-between">
              <span>Git & GitHub</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[30%]"></div>
              </div>
            </li>
            <li class="flex items-center justify-between">
              <span>Docker</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[1%]"></div>
              </div>
            </li>

            <li class="flex items-center justify-between">
              <span>Linux</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[55%]"></div>
              </div>
            </li>

            <li class="flex items-center justify-between">
              <span>Vite</span>
              <div class="w-32 h-1 bg-black/10">
                <div class="h-full bg-black w-[15%]"></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Education Section -->
  <section id="education" class="py-20 bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-12">Education</h2>
      <div class="space-y-8">
        <div class="border-2 border-white p-6">
          <div class="flex items-start justify-between mb-4">
            <div>
              <h3 class="text-xl font-bold">
                Bachelor in Computer Applicaton
              </h3>
              <p class="text-white/60">
                Asian School of Management & Technology
              </p>
            </div>
            <span class="text-white/60">2025 - Present</span>
          </div>
          <ul class="space-y-2 text-white/80">
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Basic Knowledge of programminig
            </li>
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Currently exploring programming and building projects to enhance
              my skills
            </li>
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Passionate about technology and continuously experimenting with
              code
            </li>
          </ul>
        </div>

        <div class="border-2 border-white p-6">
          <div class="flex items-start justify-between mb-4">
            <div>
              <h3 class="text-xl font-bold">
                +2 [Higher Secondary Education]
              </h3>
              <p class="text-white/60">Damauli College</p>
            </div>
            <span class="text-white/60">2022</span>
          </div>
          <ul class="space-y-2 text-white/80">
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Basic Knowledge of web development
            </li>
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Build simple prijects
            </li>
            <li class="flex items-center">
              <i data-lucide="check" class="w-4 h-4 mr-2"></i>
              Building a strong foundation in modern front-end development
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-12">Featured Projects</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Project 1 -->
        <div class="border-2 border-black group hover:bg-black transition-colors ease-in duration-200">
          <div class="relative h-48">
            <img src="/Image/Youtube-clone.png" alt="YouTube Clone" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-colors"></div>
          </div>
          <div class="p-6 group-hover:text-white">
            <h3 class="text-xl font-bold mb-2">Youtube Clone</h3>
            <p class="text-black/60 group-hover:text-white/60 mb-4">
              YouTube clone created using front-end technologies, focusing on
              layout, UI design, video thumbnails, search bar, and responsive
              styling to mimic the original platform
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-2 py-1 text-xs border border-current">HTML</span>
              <span class="px-2 py-1 text-xs border border-current">CSS</span>
            </div>
            <a href="/YoutubeClone/HTML/index.html" class="inline-flex items-center text-sm font-medium">
              View Project
              <i data-lucide="external-link" class="ml-2 w-4 h-4"></i>
            </a>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="border-2 border-black group hover:bg-black transition-colors ease-in duration-200">
          <div class="relative h-48">
            <img src="/Image/TicTacToe.png" alt="game of TicTacToe" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-colors"></div>
          </div>
          <div class="p-6 group-hover:text-white">
            <h3 class="text-xl font-bold mb-2">Game of TicTakToe</h3>
            <p class="text-black/60 group-hover:text-white/60 mb-4">
              Tic-Tac-Toe game built with front-end and back-end functionality
              using JavaScript. The game includes player turns, win condition
              checks, and a simple server-side logic to handle gameplay state
              and reset functionality
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-2 py-1 text-xs border border-current">JavaScript</span>

              <span class="px-2 py-1 text-xs border border-current">HTML</span>
              <span class="px-2 py-1 text-xs border border-current">CSS</span>
            </div>
            <a href="https://prashtech.netlify.app/" class="inline-flex items-center text-sm font-medium">
              View Project
              <i data-lucide="external-link" class="ml-2 w-4 h-4"></i>
            </a>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="border-2 border-black group hover:bg-black transition-colors ease-in duration-200">
          <div class="relative h-48">
            <img src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?w=800&auto=format&fit=crop&q=80"
              alt="Task Manager" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-colors"></div>
          </div>
          <div class="p-6 group-hover:text-white">
            <h3 class="text-xl font-bold mb-2">Task Manager</h3>
            <p class="text-black/60 group-hover:text-white/60 mb-4">
              A collaborative task management application with real-time
              updates, team collaboration features, and detailed progress
              tracking.
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="px-2 py-1 text-xs border border-current">React</span>
              <span class="px-2 py-1 text-xs border border-current">Firebase</span>
              <span class="px-2 py-1 text-xs border border-current">Material-UI</span>
            </div>
            <a href="#" class="inline-flex items-center text-sm font-medium">
              View Project
              <i data-lucide="external-link" class="ml-2 w-4 h-4"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-12">Get in Touch</h2>
      <div class="grid md:grid-cols-2 gap-12">
        <div>
          <p class="text-lg mb-8">
            I'm always excited to connect with fellow developers, potential
            collaborators, or anyone interested in web development. Whether
            you have a project in mind or just want to say hello, feel free to
            reach out!
          </p>
          <div class="space-y-4">
            <a href="mailto:contact@prashantshrestha.com"
              class="flex items-center text-white/60 hover:text-white transition-colors">
              <i data-lucide="mail" class="mr-4"></i>
              prashants2062@gmail.com
            </a>
            <a href="https://github.com/prashant-shrestha" target="_blank" rel="noopener noreferrer"
              class="flex items-center text-white/60 hover:text-white transition-colors">
              <i data-lucide="github" class="mr-4"></i>
              github.com/prashantlord
            </a>
            <a href="https://www.linkedin.com/in/prashantshre/" target="_blank" rel="noopener noreferrer"
              class="flex items-center text-white/60 hover:text-white transition-colors">
              <i data-lucide="linkedin" class="mr-4"></i>
              Prashant Shrestha
            </a>
          </div>
        </div>
        <form class="space-y-6" method="POST" action="">
          <div>
            <label for="name" class="block text-sm font-medium mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 bg-white text-black" required />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 bg-white text-black" required />
          </div>

          <div>
            <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
            <input type="text" id="subject" name="subject" class="w-full px-4 py-2 bg-white text-black" required />
          </div>

          <div>
            <label for="message" class="block text-sm font-medium mb-2">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 bg-white text-black"
              required></textarea>
          </div>

          <button type="submit" class="w-full px-6 py-3 bg-white text-black hover:bg-white/90 transition-colors">Send
            Message</button>
        </form>
      </div>
    </div>
  </section>

  <script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Mobile menu toggle
    const menuButton = document.getElementById("menuButton");
    const mobileMenu = document.getElementById("mobileMenu");
    const menuIcon = document.getElementById("menuIcon");
    let isMenuOpen = false;

    menuButton.addEventListener("click", () => {
      isMenuOpen = !isMenuOpen;
      mobileMenu.classList.toggle("hidden");
      menuIcon.setAttribute("data-lucide", isMenuOpen ? "x" : "menu");
      lucide.createIcons();
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          target.scrollIntoView({
            behavior: "smooth",
          });
          // Close mobile menu if open
          if (isMenuOpen) {
            isMenuOpen = false;
            mobileMenu.classList.add("hidden");
            menuIcon.setAttribute("data-lucide", "menu");
            lucide.createIcons();
          }
        }
      });
    });

    // Active section highlighting
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-link");

    window.addEventListener("scroll", () => {
      const scrollPosition = window.scrollY + 100;

      sections.forEach((section) => {
        const top = section.offsetTop;
        const height = section.offsetHeight;

        if (scrollPosition >= top && scrollPosition < top + height) {
          const id = section.getAttribute("id");
          navLinks.forEach((link) => {
            link.classList.remove("text-black");
            link.classList.add("text-black/60");
            if (link.getAttribute("href") === `#${id}`) {
              link.classList.remove("text-black/60");
              link.classList.add("text-black");
            }
          });
        }
      });
    });
  </script>
</body>

</html>
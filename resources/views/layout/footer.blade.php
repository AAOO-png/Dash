<footer class="bg-white flex items-center justify-center py-2 px-10  ">
    <div class="container mx-auto flex justify-between items-center">
        <span class="text-sm text-gray-500">
            © 2024 - <span id="current-year"></span> PT DinamikaIndoMedia. All rights reserved.
        </span>
        
    </div>
    <script>
        // Mengatur tahun saat ini secara dinamis
        const currentYear = new Date().getFullYear();
        document.getElementById("current-year").textContent = currentYear;
    </script>
</footer>

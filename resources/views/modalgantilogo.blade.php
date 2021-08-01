<div class="modal" id="header-footer-modal-preview">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Ganti Logo</h2> <button
                class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex">
        </div>
        <div class="p-5 ">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit mx-auto relative">
                <img alt="Midone Tailwind HTML Admin Template" id="tempat_gambar" class="rounded-full" src="{{ asset('assets') }}/images/dian-logo.png">
                <div class="cursor-pointer absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2" onclick="gantiGambar()"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> </div>
            </div>
            <form action="{{route('changeLogo')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <input type="file" accept=".png" class="hidden" name="gambar" id="gambar" onchange="showPreview()">
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" data-dismiss="modal"
                class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Batal</button>
            <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button> </div>
        </form>
    </div>
</div>

<script>
    function gantiGambar(){
        const input_gambar = document.getElementById('gambar');
        input_gambar.click();
    }

    function showPreview(){
        const input_gambar = document.getElementById('gambar');
        const tempat_gambar = document.getElementById('tempat_gambar');
        const [file] = input_gambar.files;
        if (file) {
            tempat_gambar.src = URL.createObjectURL(file);
        }
    }
</script>
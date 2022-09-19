<div class="relative bg-primary">
  <div class="container">
    <div class="flex items-center flex-wrap -mx-6">
      <div class="hidden lg:block w-1/3 px-6">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/consultation.jpeg" alt="" class="rounded-xl -my-10">
      </div>
      <div class="w-full lg:w-2/3 text-gray-900 px-6 py-6">
        <div class="text-4xl font-title mb-4"><?php _e("Безкоштовний тест", "treba-wp"); ?></div>
        <div class="text-xl mb-4"><?php _e("Заповніть форму і протестуйте систему ароматизації вашого приміщення", "treba-wp"); ?></div>
        <div class="text-2xl font-title mb-6"><?php _e("7 днів безкоштовно", "treba-wp"); ?></div>
        <div>
          <form name="form_consultation">
            <div class="flex items-center lg:-mx-2">
              <div class="lg:px-2">
                <input type="tel" name="Телефон" placeholder="Ваш телефон" class="w-full custom-input input-userphone border border-gray-200 py-2 px-4" required>
              </div>
              <div class="lg:px-2">
                <button type="submit" class="w-full block bg-gray-900 text-white rounded px-4 py-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
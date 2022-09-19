<div>
  <form name="form_contact">
    <div class="flex flex-wrap flex-col">
      <div class="mb-6">
        <input type="tel" name="Phone/Email" placeholder="<?php _e("Ваш телефон або email", "treba-wp"); ?>" class="w-full custom-input text-white bg-main-gray/75 border border-main-gray px-6 py-4 input-userphone" required>
      </div>
      <div class="mb-6">
        <textarea name="Message" rows="5" placeholder="<?php _e("Ваше повідомлення", "treba-wp"); ?>" class="w-full custom-input text-white bg-main-gray/75 border border-main-gray px-6 py-4"></textarea>
      </div>
      <div class="">
        <button type="submit" class="w-full flex items-center justify-center bg-main-gray border border-transparent hover:border-primary text-white rounded px-6 py-4">
          <span class="text-lg mr-2"><?php _e("Відправити", "treba-wp"); ?></span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
  </form>
</div>
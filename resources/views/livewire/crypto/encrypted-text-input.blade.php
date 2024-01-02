<div>
    @if ($alert['d-success'])
        <div id="toast-encrypt-success"
            class="fixed top-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $alert['d-message'] }}</div>
            <button type="button"
                class="btn-close ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-encrypt-success" data-bs-dismiss="#toast-encrypt-success" aria-label="Close"
                onclick="document.getElementById('toast-encrypt-success').style.display = 'none'">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @elseif($alert['d-error'])
        <div id="toast-encrypt-danger"
            class="fixed top-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $alert['d-message'] }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-encrypt-danger" aria-label="Close"
                onclick="document.getElementById('toast-encrypt-danger').style.display = 'none'">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <form id="encryptInputForm" wire:submit.prevent="decryptMessage('decrypt')">
        <div class="form-group">
            <div class="mt-2">
                <textarea id="plainText" name="encryptedText" rows="15" cols="100"
                    class="block w-full rounded-md border-0 p-3 text-gray-300 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 border-gray-700 bg-gray-900 focus:border-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    wire:model="encryptedText" required>{{ $encryptedText }}</textarea>
                <div>
                    @error('encryptedText')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="encryptSecret" class="text-xs text-white uppercase tracking-widest">Secret</label>
                    <input type="password" name="encryptSecret" id="encryptSecret"
                        class="block w-full rounded-md border-0 p-3 text-gray-300 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 border-gray-700 bg-gray-900 focus:border-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        wire:model="encryptSecret" required>
                    <div>
                        @error('encryptSecret')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mt-4">
                        @if ($loading)
                            <button
                                class="items-center px-4 py-3 bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-800 focus:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150 w-full cursor-not-allowed"
                                disabled>Decrypting</button>
                        @else
                            <button name=""
                                class="items-center px-4 py-3 bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-800 focus:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150 w-full cursor-pointer"
                                wire:click="decryptMessage('decrypt')">Decrypt
                                Text</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </form>

    <div wire:ignore>
        <script>
            document.addEventListener('encryptedTextUpdated', function(e) {
                const encryptedText = e.detail;
                @this.set('encryptedText', encryptedText[0]);
            });
            document.getElementById('plainInputForm').addEventListener('submit', function(e) {
                e.preventDefault();
            });
        </script>
    </div>
</div>

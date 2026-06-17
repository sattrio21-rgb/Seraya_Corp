{{-- Footer Component --}}
<div class="relative">
    {{-- Wave Decoration --}}
    <div class="absolute top-0 left-0 w-full overflow-hidden -translate-y-[99%] leading-none">
        <svg class="relative block w-[calc(100%+1.3px)] h-[50px] text-secondary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="white"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="fill-primary"></path>
        </svg>
        <div class="h-4 w-full bg-secondary absolute bottom-0"></div>
    </div>

    <footer class="bg-secondary pt-10 pb-6">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-12 mb-16 text-sm text-center md:text-left">
                {{-- Col 1: Hubungi Kami --}}
                <div class="px-2">
                    <h5 class="font-serif font-bold text-primary mb-4">Hubungi Kami</h5>
                    <ul class="space-y-3 text-gray-600 text-xs">
                        <li class="flex items-start justify-center md:justify-start gap-2">
                            <span class="text-red-500 mt-0.5">📍</span>
                            <span>Jl. Diponegoro No. 45, Malang, Jawa Timur</span>
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-2">
                            <span class="text-gray-800">📞</span>
                            <span>0812-8516-9123</span>
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-2">
                            <span class="text-gray-800">✉️</span>
                            <span>info@serayacorp.com</span>
                        </li>
                    </ul>
                </div>

                {{-- Col 2: Layanan Kami --}}
                <div class="px-2">
                    <h5 class="font-serif font-bold text-primary mb-4">Layanan Kami</h5>
                    <ul class="space-y-3 text-gray-600 text-xs">
                        <li><a href="{{ route('visitor.packages') }}" class="hover:text-primary">Event & Gathering Perusahaan</a></li>
                        <li><a href="{{ route('visitor.packages') }}" class="hover:text-primary">Private Trip</a></li>
                        <li><a href="{{ route('visitor.packages') }}" class="hover:text-primary">Open Trip</a></li>
                        <li><a href="{{ route('visitor.packages') }}" class="hover:text-primary">Paket Wedding</a></li>
                    </ul>
                </div>

                {{-- Col 3: Support --}}
                <div class="px-2">
                    <h5 class="font-serif font-bold text-primary mb-4">Support</h5>
                    <ul class="space-y-3 text-gray-600 text-xs">
                        <li><a href="#" class="hover:text-primary">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-primary">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-primary">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                {{-- Col 4: Ikuti Kami --}}
                <div class="px-2">
                    <h5 class="font-serif font-bold text-primary mb-4">Ikuti Kami</h5>
                    <ul class="space-y-3 text-gray-600 text-xs">
                        <li><a href="#" class="hover:text-primary">Facebook</a></li>
                        <li><a href="#" class="hover:text-primary">Instagram</a></li>
                        <li><a href="#" class="hover:text-primary">TikTok</a></li>
                    </ul>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-gray-200 pt-6 text-center">
                <p class="text-[10px] text-gray-500 uppercase tracking-widest">© COPYRIGHT SERAYA TRAVEL {{ date('Y') }}</p>
            </div>
        </div>
    </footer>
</div>

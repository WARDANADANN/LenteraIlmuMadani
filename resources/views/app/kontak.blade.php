@extends('template.main')
@section('content')
 <!-- Library Section -->
 <!-- Contact Form Section -->
    <section class="container mx-auto my-8 p-4">
        <div class="flex flex-col md:flex-row justify-around items-start">
            <!-- Contact Information -->
            <div class="w-full h-[465px] mr-4 bg-gray-300 rounded-lg overflow-hidden shadow-lg">
                <!-- Google Maps Embed -->
                <iframe class="w-full h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093675!2d144.95592831531694!3d-37.81720997975143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d1d5eabc3422!2sTailwind%20St%2C%20CSS%20City%2C%20Web%201010!5e0!3m2!1sen!2s!4v1600417295733!5m2!1sen!2s"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>


            <!-- Contact Form -->
            <div class="w-full  md:w-1/2 bg-white shadow-lg rounded-lg p-6">
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" id="name"
                            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Your Name">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" id="email"
                            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Your Email">
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
                        <textarea id="message"
                            class="w-full  p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            rows="5" placeholder="Your Message"></textarea>
                    </div>

                    <button type="submit"
                        class="bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 w-full">Send
                        Message</button>
                </form>
            </div>
        </div>
    </section>

@endsection

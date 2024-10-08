<x-app-layout>
    <!-- Page Header -->
    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Box -->
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg m-10 ">
                <!-- Tabs for Orders and Appointments -->
                <div x-data="ordersAppointmentsPage ">
                    <!-- Tabs Navigation -->
                    <div class="hidden sm:block">
                        <div class="border-b border-gray-700 ml-4">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <button type="button" x-on:click="activeTab = 'orders'"
                                        :class="{'border-teal-500 text-teal-400': activeTab === 'orders', 'border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300': activeTab !== 'orders'}"
                                        class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium focus:outline-none">
                                    Orders
                                </button>
                                <button type="button" x-on:click="activeTab = 'appointments'"
                                        :class="{'border-teal-500 text-teal-400': activeTab === 'appointments', 'border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300': activeTab !== 'appointments'}"
                                        class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium focus:outline-none">
                                    Appointments
                                </button>
                            </nav>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="m-4">
                        <!-- Orders Section -->
                        <section x-show="activeTab === 'orders'">
                            <h2 class="text-2xl font-semibold mb-6 text-teal-300 text-center ">Orders</h2>
                            @if($orders->isEmpty())
                                <p class="text-gray-400">No orders found.</p>
                            @else
                                <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg shadow-sm">
                                    <thead class="bg-gray-800">
                                    <tr>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">ID</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Customer Name</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Email</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-600 transition duration-150">
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $order->id }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $order->first_name }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $order->email }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $order->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </section>

                        <!-- Appointments Section -->
                        <section x-show="activeTab === 'appointments'">
                            <h2 class="text-2xl font-semibold mb-6 text-teal-300 text-center">Appointments</h2>
                            @if($appointments->isEmpty())
                                <p class="text-gray-400">No appointments found.</p>
                            @else
                                <table class="min-w-full bg-gray-700 border border-gray-600 rounded-lg shadow-sm">
                                    <thead class="bg-gray-800">
                                    <tr>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">ID</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Customer Name</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Email</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Status</th>
                                        <th class="py-3 px-4 border-b border-gray-600 text-left text-sm font-semibold text-teal-300">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                        <tr class="hover:bg-gray-600 transition duration-150">
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $appointment->id }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $appointment->first_name }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $appointment->email }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">{{ $appointment->status }}</td>
                                            <td class="py-3 px-4 border-b border-gray-600 text-sm text-gray-300">
                                                <button type="button" class="bg-teal-600 hover:bg-teal-700 text-white px-2 py-1 rounded"
                                                        x-on:click="confirmAppointment('{{ $appointment->id }}', '{{ $appointment->email }}')">
                                                    Confirm
                                                </button>
                                                <button type="button" class="bg-yellow-600 hover:bg-yellow-400 text-white px-2 py-1 rounded ml-2"
                                                        x-on:click="rejectAppointment('{{ $appointment->id }}', '{{ $appointment->email }}')">
                                                    Reject
                                                </button>
                                               <button type="button" class="bg-red-500 hover:bg-red-500 text-white px-2 py-1 rounded ml-2"
                                    x-on:click="deleteAppointment('{{ $appointment->id }}')">
                                Delete
                            </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <!-- Modal for confirmation -->
                                <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-gray-800 p-4 rounded shadow-lg max-w-md w-full">
                                            <h2 class="text-xl mb-4 text-teal-300" x-text="modalMessage"></h2>
                                            <div class="flex justify-end">
                                                <button class="bg-gray-600 hover:bg-gray-700 text-gray-300 px-4 py-2 rounded mr-2"
                                                        x-on:click="closeModal()">Cancel</button>
                                                <button class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded"
                                                        x-on:click="handleConfirm()">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </section>
                    </div>

                    <!-- Graphs Section -->
                    <div class="mt-8 m-5">
                        <h2 class="text-2xl font-semibold mb-6 text-teal-300 text-center">Analytics</h2>

                        <!-- Orders Graph -->
                        <h2 class="text-small font-semibold mb-6 text-teal-300 ml-4">Orders -></h2>
                        <canvas id="ordersChart" class="mb-8 h-64 bg-gray-700 shadow-lg rounded-lg p-4"></canvas>

                        <!-- Appointments Graph -->
                        <h2 class="text-small font-semibold mb-6 text-teal-300 ml-4">Appointments -></h2>
                        <canvas id="appointmentsChart" class="mb-8 h-64 bg-gray-700 shadow-lg rounded-lg p-4"></canvas>

                        <!-- Customers Graph -->
                        <h2 class="text-small font-semibold mb-6 text-teal-300 ml-4">Customers -></h2>
                        <canvas id="customersChart" class="mb-8 h-64 bg-gray-700 shadow-lg rounded-lg p-4"></canvas>

                        <!-- Pie Chart -->
                        <div class="flex justify-center items-center w-full h-80 mb-8">  <!-- Larger outer div for centering -->
                            <canvas id="pieChart" class="w-72 h-72"></canvas>  <!-- Larger canvas size -->
                        </div>
                    </div>

                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('ordersAppointmentsPage', () => ({
                activeTab: 'orders',
                showModal: false,
                modalMessage: '',
                appointmentId: null,
                appointmentEmail: null,
                action: null,

                confirmAppointment(id, email) {
                    this.showModal = true;
                    this.modalMessage = 'Are you sure you want to confirm this appointment?';
                    this.appointmentId = id;
                    this.appointmentEmail = email;
                    this.action = 'confirm';
                },

                rejectAppointment(id, email) {
                    this.showModal = true;
                    this.modalMessage = 'Are you sure you want to reject this appointment?';
                    this.appointmentId = id;
                    this.appointmentEmail = email;
                    this.action = 'reject';
                },

                deleteAppointment(id) {
                    this.showModal = true;
                    this.appointmentId = id;
                    this.modalMessage = 'Are you sure you want to delete this appointment?';
                    this.action = 'delete'; // Set action for deletion
                },

                closeModal() {
                    this.showModal = false;
                    this.appointmentId = null;
                    this.appointmentEmail = null;
                    this.action = null;
                },

                handleConfirm() {
                    this.showModal = false;

                    // Handle confirm or reject actions
                    if (this.action === 'confirm' || this.action === 'reject') {
                        axios.post('/appointments/notify', {
                            appointment_id: this.appointmentId,
                            email: this.appointmentEmail,
                            action: this.action
                        }).then(response => {
                            alert('Email sent successfully.');
                            location.reload(); // Reload page to reflect changes
                        }).catch(error => {
                            console.error('Error sending email:', error);
                            alert('Error sending email. Please try again.');
                        });
                    }
                    // Handle delete action
                    else if (this.action === 'delete') {
                        axios.delete(`/appointments/${this.appointmentId}`)
                            .then(response => {
                                alert('Appointment deleted successfully.');
                                location.reload(); // Reload page to reflect changes
                            })
                            .catch(error => {
                                console.error('Error deleting appointment:', error);
                                alert('Error deleting appointment. Please try again.');
                            });
                    }
                }
            }));
        });
        //orders chart data
        const ordersCountByMonth = {!! json_encode($orders->groupBy(fn($date) => \Carbon\Carbon::parse($date->created_at)->format('Y-m'))->map->count()) !!};
        const ordersMonths = Object.keys(ordersCountByMonth);
        const ordersCounts = Object.values(ordersCountByMonth);

        //appointments chart data
        const appointmentsCountByMonth = {!! json_encode($appointments->groupBy(fn($date) => \Carbon\Carbon::parse($date->created_at)->format('Y-m'))->map->count()) !!};
        const appointmentsMonths = Object.keys(appointmentsCountByMonth);
        const appointmentsCounts = Object.values(appointmentsCountByMonth);

        //customers chart data
        const customersCountByMonth = {!! json_encode($customers->groupBy(fn($date) => \Carbon\Carbon::parse($date->created_at)->format('Y-m'))->map->count()) !!};
        const customersMonths = Object.keys(customersCountByMonth);
        const customersCounts = Object.values(customersCountByMonth);

        // Get current month in 'Y-m' format
        const currentMonth = new Date().toISOString().slice(0, 7);

        // Get the count for the current month
        const currentOrdersCount = ordersCountByMonth[currentMonth] || 0;
        const currentAppointmentsCount = appointmentsCountByMonth[currentMonth] || 0;




        const ordersChartCtx = document.getElementById('ordersChart').getContext('2d');
        new Chart(ordersChartCtx, {
            type: 'bar',
            data: {
                labels: ordersMonths,
                datasets: [{
                    label: 'Orders Count',
                    data: ordersCounts,
                    backgroundColor: 'rgba(45, 212, 191, 0.2)',
                    borderColor: 'rgba(45, 212, 191, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Orders',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#94a3b8'
                        }
                    }
                }
            }
        });

        const appointmentsChartCtx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(appointmentsChartCtx, {
            type: 'line',
            data: {
                labels: appointmentsMonths,
                datasets: [{
                    label: 'Appointments Count',
                    data: appointmentsCounts,
                    backgroundColor: 'rgba(20, 184, 166, 0.2)',
                    borderColor: 'rgba(20, 184, 166, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Appointments',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#94a3b8'
                        }
                    }
                }
            }
        });

        const customersChartCtx = document.getElementById('customersChart').getContext('2d');
        new Chart(customersChartCtx, {
            type: 'line',
            data: {
                labels: customersMonths,
                datasets: [{
                    label: 'Customers Count',
                    data: customersCounts,
                    backgroundColor: 'rgba(20, 184, 166, 0.2)',
                    borderColor: 'rgba(20, 184, 166, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Customers',
                            color: '#94a3b8'
                        },
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(148, 163, 184, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#94a3b8'
                        }
                    }
                }
            }
        });

        // Pie chart data
        const pieChartCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieChartCtx, {
            type: 'pie',
            data: {
                labels: ['Orders', 'Appointments'],
                datasets: [{
                    label: 'Current Month Data',
                    data: [currentOrdersCount, currentAppointmentsCount],
                    backgroundColor: [
                        'rgba(45, 212, 191, 0.6)',
                        'rgba(20, 184, 166, 0.6)'
                    ],
                    borderColor: [
                        'rgba(45, 212, 191, 1)',
                        'rgba(20, 184, 166, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#94a3b8'
                        }
                    }
                }
            }
        });
    </script>
    </div>

    <footer class="bg-black text-white py-2">  <!-- Reduced vertical padding -->
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">  <!-- Centered vertically -->
            <div class="logo mb-2 md:mb-0 flex-shrink-0">  <!-- Added flex-shrink to prevent logo resizing -->
                <img src="{{ asset('/assets/logo.png') }}" alt="Footer Logo" class="max-w-xs">
            </div>
            <div class="flex flex-col md:flex-row md:space-x-10 items-center">  <!-- Center items vertically -->
                <div class="company mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Company</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Home</a></li>  <!-- Reduced font size -->
                        <li><a href="#" class="hover:underline text-xs">About</a></li>
                        <li><a href="#" class="hover:underline text-xs">Services</a></li>
                    </ul>
                </div>
                <div class="legal mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Legal</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:underline text-xs">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="social mb-2 md:mb-0 text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Social</h4>  <!-- Reduced font size -->
                    <ul>
                        <li><a href="#" class="hover:underline text-xs">Instagram</a></li>
                        <li><a href="#" class="hover:underline text-xs">Twitter</a></li>
                    </ul>
                </div>
                <div class="contact text-center md:text-left">  <!-- Center text in smaller screens -->
                    <h4 class="font-semibold mb-1 text-sm">Contact</h4>  <!-- Reduced font size -->
                    <p class="text-xs">Email: <a href="mailto:info@thetorettos.com" class="hover:underline">info@thetorettos.com</a></p>
                    <p class="text-xs">Phone: (123) 456-7890</p>
                    <p class="text-xs">Location: 1234 Detailing Ave, City, State</p>
                </div>
            </div>
        </div>
    </footer>



</x-app-layout>

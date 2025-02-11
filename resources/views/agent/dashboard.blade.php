@extends('agent.agentlayout')
@section('bodycontent')
    <style>
        td {
            height: 70px;
            cursor: pointer;
        }
        .inactive{
          background-color:rgba(103, 248, 200, 0.281) !important;
          color: rgb(173, 173, 173) !important;
          cursor:default;
        }

    </style>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">

                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <header>

                                <div class="icons">
                                    <span style="cursor: pointer;" id="prev" class="material-symbols-rounded">
                                        <<&nbsp;&nbsp; </span><b class="current-date"></b><span id="next"
                                                style="cursor: pointer;"
                                                class="material-symbols-rounded">&nbsp;&nbsp;>></span>
                                </div>
                            </header>
                            <table class="table table-bordered  table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody class="days">
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{-- <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-12 col-lg-12 col-xl-12  mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Electronic</h6>
                                    <small class="text-muted">Mobile, Earbuds, TV</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Fashion</h6>
                                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">23.8k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Decor</h6>
                                    <small class="text-muted">Fine Art, Dining</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">849k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Sports</h6>
                                    <small class="text-muted">Football, Cricket Kit</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">99</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

    </div> --}}


    <script>
        const daysTag = document.querySelector(".days"),
            currentDate = document.querySelector(".current-date"),
            prevNextIcon = document.querySelectorAll(".icons span");

        // getting new date, current year and month
        let date = new Date(),
            currYear = date.getFullYear(),
            currMonth = date.getMonth();

        // storing full name of all months in array
        const months = ["January", "February", "March", "April", "May", "June", "July",
            "August", "September", "October", "November", "December"
        ];

        const renderCalendar = () => {
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
            let liTag = "<tr>";
            let weekofday = 0;
            for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days

                liTag += `<td class="inactive">${lastDateofLastMonth - i + 1}</td>`;
                weekofday++;
            }

            for (let i = 1; i <= lastDateofMonth; i++) {
                if (weekofday == 7) {
                    liTag += '</tr><tr>';
                    weekofday = 0;
                }
                // creating li of all days of current month
                // adding active class to li if the current day, month, and year matched
                let isToday = i === date.getDate() && currMonth === new Date().getMonth() &&
                    currYear === new Date().getFullYear() ? "active" : "";
                liTag += `<td class="${i}" data-bs-toggle="modal" data-bs-target="#exampleModal">${i}</td>`;
                weekofday++;
            }
            
            for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                liTag += `<td class="inactive">${i - lastDayofMonth + 1}</td>`
            }
            currentDate.innerText =
                `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
            daysTag.innerHTML = liTag + "</tr>";
        }
        renderCalendar();

        prevNextIcon.forEach(icon => { // getting prev and next icons
            icon.addEventListener("click", () => { // adding click event on both icons
                // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

                if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                    // creating a new date of current year & month and pass it as date value
                    date = new Date(currYear, currMonth, new Date().getDate());
                    currYear = date.getFullYear(); // updating current year with new date year
                    currMonth = date.getMonth(); // updating current month with new date month
                } else {
                    date = new Date(); // pass the current date as date value
                }
                renderCalendar(); // calling renderCalendar function
            });
        });
    </script>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Your Lawn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="eventtype">Event Type</label>
                            <select class="custom-select form-control" name="eventtype" id="eventtype">
                                <option selected disabled>Select one</option>
                                <option value="Marriage">Marriage</option>
                                <option value="Anniversary">Anniversary</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Ring-Ceremony">Ring-Ceremony</option>
                                <option value="Business Party">Business Party</option>
                                <option value="Seminor">Seminor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numberofdays">Number Of Days</label>
                            <input type="number" class="form-control" name="numberofdays" id="numberofdays"
                                placeholder="Number Of Days">
                        </div>
                        <div class="form-group">
                            <label for="nameofcustomer">Name of Customer</label>
                            <input type="text" class="form-control" name="nameofcustomer" id="nameofcustomer"
                                placeholder="Name of Customer">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="paid">Paid</label>
                            <input type="number" class="form-control" name="paid" id="paid"
                                placeholder="Paid">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsforbooking">Book Now and Print Invoice</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailsforbooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <style>
                  h3>span{
                    font-weight: 300;
                    color: rgb(93, 105, 218);
                  }
                  h3{
                    color: rgba(93, 106, 218, 0.555);
                  }
                  </style>
                <div class="modal-body">
                    <h3>Booked By:<span>Wedsla</span></h3> 
                    <h3>Customer Name:<span>Saurabh Singh</span></h3> 
                    <h3>Contact Number:<span> 91 6568787654</span></h3>
                    <h3>Event Type: <span> Marriage</span></h3>
                    <h3>Number of days: <span> 3 Days</span></h3>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Book Now and Print Invoice</button>
                </div>
            </div>
        </div>
    </div>
@stop

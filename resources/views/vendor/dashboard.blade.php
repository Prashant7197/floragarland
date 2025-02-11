@extends('vendor.vendorlayout')
@section('bodycontent')

    <script src="/adminpanel/assets/vendor/libs/jquery/jquery.js"></script>
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
    <script> 
    function loaddate(e){
document.getElementById('dateofbooking').value = e;

 }
    
    function getBooking(m,y){
    
    
    
    }
    
    function load(e){
                
                $.get('/vendor/get/bookingdetail/'+e,{},function(response){
        
                document.getElementById('booking_detail').innerHTML = response.html;
        
    
    });
     }
 </script>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">

                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body" style="width:100%; overflow-x:scroll;">
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
            let eve;
            $.get('/vendor/get/booking/'+currMonth+'/'+currYear,{},function(response){
          
          eve = response.booking;
            for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days

                liTag += `<td class="inactive">${lastDateofLastMonth - i + 1}</td>`;
                weekofday++;
            }
            
            let token = 0;
            token = (token+1)-1;
            for (let i = 1; i <= lastDateofMonth; i++) {
                if (weekofday == 7) {
                    liTag += '</tr><tr>';
                    weekofday = 0;
                }
                // creating li of all days of current month
                // adding active class to li if the current day, month, and year matched
                let isToday = i === date.getDate() && currMonth === new Date().getMonth() &&
                    currYear === new Date().getFullYear() ? "active" : "";
                    if(eve[token]!=undefined){
                        
                    
                        if(eve[token].booking_date==(currYear+'-'+(currMonth+1).toString().padStart(2,0)+'-'+i.toString().padStart(2,0))){
                            liTag += `<td id="${i}" data-bs-toggle="modal" onclick="load(`+eve[token].id+`)" data-bs-target="#detailsforbooking" class="booked" style="background-color:#2da6cb;color:white;"onclick="loaddate('${currYear}`+`-`+(currMonth+1).toString().padStart(2,0)+`-`+i.toString().padStart(2,0)+`')">${i}</td>`;
                            console.log(eve[token].booking_date);
                token++;
                        }else{
                            liTag += `<td id="${i}" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loaddate('${currYear}`+`-`+(currMonth+1).toString().padStart(2,0)+`-`+i.toString().padStart(2,0)+`')">${i}</td>`;
                
                        }
                    }else{
                        liTag += `<td id="${i}" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loaddate('${currYear}`+`-`+(currMonth+1).toString().padStart(2,0)+`-`+i.toString().padStart(2,0)+`')">${i}</td>`;
                    }
                    
                weekofday++;
            }
       
            for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                liTag += `<td class="inactive">${i - lastDayofMonth + 1}</td>`
            }
            currentDate.innerText =
                `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
            daysTag.innerHTML = liTag + "</tr>";
        });
        }
        renderCalendar();

        prevNextIcon.forEach(icon => { // getting prev and next icons
            icon.addEventListener("click", () => { // adding click event on both icons
                // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

                if (currMonth < 0 || currMonth > 11) {
                     // if current month is less than 0 or greater than 11
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
                    <form action="/vendor/booking_lawn" method="POST">
                        @csrf
                <div class="modal-body">
                    <div class="form-group">
                            <label for="dateofbooking">Date Of Bokking</label>
                            <input type="date" class="form-control" name="dateofbooking" id="dateofbooking" readonly />
                        </div>
                        <div class="form-group">
                            <label for="eventtype">Event Type</label>
                            <select class="custom-select form-control" name="eventtype" id="eventtype" required>
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
                            <label for="nameofcustomer">Name of Customer</label>
                            <input type="text" class="form-control" name="nameofcustomer" id="nameofcustomer"
                                placeholder="Name of Customer" required>
                        </div>
                        <div class="form-group">
                            <label for="mobileofcustomer">Mobile</label>
                            <input type="tel" class="form-control" maxlength="10" name="mobileofcustomer" id="mobileofcustomer"
                                placeholder="Mobile Number">
                        </div>  <div class="form-group">
                            <label for="emailofcustomer">Email</label>
                            <input type="email" class="form-control" name="emailofcustomer" id="emailofcustomer"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="bookingnote">Remark</label>
                            <textarea class="form-control" name="bookingnote" id="bookingnote" rows="3"></textarea>
                        </div>
                        
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
                </form>
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
                <div class="modal-body" id="booking_detail">
                    
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script id="sc"></script>
@stop



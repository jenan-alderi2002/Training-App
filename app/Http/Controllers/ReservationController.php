<?php

namespace App\Http\Controllers;

    use App\Http\Requests\ReservationRequest;
    use App\Models\Reservation;
    use App\Models\EmployeeService;
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request, EmployeeService $employee_Service): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();

        $employee = $employee_Service->employee;
        $service = $employee_Service->service;

        $employee_start_time = Carbon::make($employee->start_time);
        $employee_end_time = Carbon::make($employee->end_time);

        $start = Carbon::make($request['start_time']);
        $end = Carbon::make($request['end_time']);



        if ($start->greaterThanOrEqualTo($end)) {
            return response()->json(['error' => 'Start time must be before end time.'], 400);
        }

        if ($start->lt($employee_start_time) || $end->gt($employee_end_time)) {
            return response()->json(['error' => 'Reservation time is outside the available hours for this employee'], 400);
        }

        $duration = $start->diffInHours($end);

        $pricePerHour = $employee_Service->price_per_hour;
        $totalPrice = $duration * $pricePerHour;

        $exists = Reservation::query()
            ->where('employee_services_id', $employee_Service->id)
            ->where('date', $request['date'])
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_time', [$start, $end])
                    ->orWhereBetween('end_time', [$start, $end])
                    ->orWhere(function ($query) use ($start, $end) {
                        $query->where('start_time', '<=', $start)
                            ->where('end_time', '>=', $end);
                    });
            })
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'The reservation already exists for this employee.'], 409);
        }

        $validatedData['employee_services_id'] = $employee_Service->id;
        $validatedData['client_id'] = Auth::id();
        $validatedData['price'] = $totalPrice;

        $reservation = Reservation::create($validatedData);

        return response()->json(['message' => 'Reservation created successfully', 'reservation' => $reservation], 200);
    }

}

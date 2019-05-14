<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
   protected $table = 'inventory_msts';

   protected $fillable = ["Inventory_code","Store_Code","Article_Code","Size_Group","Qty_R1","Qty_R2","Qty_R3","Qty_R4","Qty_R5","Qty_R6","Qty_R7","Qty_R8","Qty_R9","Qty_R10","Qty_R11","Qty_R12","Qty_R13","Qty_R14","Qty_R15","Cost_R1","Cost_R2","Cost_R3","Cost_R4","Cost_R5","Cost_R6","Cost_R7","Cost_R8","Cost_R9","Cost_R10","Cost_R11","Cost_R12","Cost_R13","Cost_R14","Cost_R15"];
}

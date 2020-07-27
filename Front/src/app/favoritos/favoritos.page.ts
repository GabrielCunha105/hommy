import { Component, OnInit } from '@angular/core';

export class DormRoom {
  address: string;
  numberOfBedrooms:number;
  numberOfBathrooms: number;
  numberOfResidents: number;
  allowsAnimals: boolean;
  size:number;
  price: number;
  imageSource: String;
}

@Component({
  selector: 'app-favoritos',
  templateUrl: './favoritos.page.html',
  styleUrls: ['./favoritos.page.scss'],
})
export class FavoritosPage implements OnInit {
  DormRoomData: DormRoom[];

  constructor() { }

  ngOnInit() {
    this.DormRoomData = [
      {
        address: 'Rio de Janeiro, RJ, Cidade Universitária, Rua Hélio de Almeida, 65',
        numberOfBedrooms: 3,
        numberOfBathrooms: 2,
        numberOfResidents: 6,
        allowsAnimals: true,
        size: 123.45,
        price: 678.91,
        imageSource: '../../assets/Apto1.jpeg',
      },
      {
      address: 'Belo Horizonte, MG, Papula, Rua Agenor Goulart Filho, 65',
      numberOfBedrooms: 2,
      numberOfBathrooms: 1,
      numberOfResidents: 4,
      allowsAnimals: false,
      size: 258.46,
      price: 456.28,
      imageSource: '../../assets/Apto3.jpeg',
    },
    ]
  }
}

"use client"

import { useState } from "react"
import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { ArrowRight } from "lucide-react"

const motorcycles = [
  {
    id: 1,
    name: "Yamaha YZF-R1",
    category: "Sport",
    price: 18499,
    year: 2024,
    mileage: 0,
    image: "/yamaha-r1-sport-motorcycle-side-view.jpg",
  },
  {
    id: 2,
    name: "Harley-Davidson Street Glide",
    category: "Cruiser",
    price: 27999,
    year: 2024,
    mileage: 0,
    image: "/harley-davidson-street-glide-cruiser-motorcycle.jpg",
  },
  {
    id: 3,
    name: "BMW R 1250 GS",
    category: "Adventure",
    price: 19995,
    year: 2024,
    mileage: 0,
    image: "/bmw-r1250gs-adventure-motorcycle.jpg",
  },
  {
    id: 4,
    name: "Ducati Panigale V4",
    category: "Sport",
    price: 28395,
    year: 2024,
    mileage: 0,
    image: "/ducati-panigale-v4-red-sport-bike.jpg",
  },
  {
    id: 5,
    name: "Honda Gold Wing",
    category: "Touring",
    price: 28500,
    year: 2023,
    mileage: 2500,
    image: "/honda-gold-wing-touring-motorcycle.jpg",
  },
  {
    id: 6,
    name: "Kawasaki Ninja ZX-10R",
    category: "Sport",
    price: 17399,
    year: 2024,
    mileage: 0,
    image: "/kawasaki-ninja-zx10r-green-sport-bike.jpg",
  },
  {
    id: 7,
    name: "Indian Chief",
    category: "Cruiser",
    price: 21999,
    year: 2023,
    mileage: 1200,
    image: "/indian-chief-cruiser-motorcycle.jpg",
  },
  {
    id: 8,
    name: "Triumph Tiger 900",
    category: "Adventure",
    price: 14995,
    year: 2024,
    mileage: 0,
    image: "/triumph-tiger-900-adventure-bike.jpg",
  },
]

export default function InventoryPage() {
  const [categoryFilter, setCategoryFilter] = useState<string>("all")
  const [sortBy, setSortBy] = useState<string>("newest")

  const filteredBikes = motorcycles
    .filter((bike) => categoryFilter === "all" || bike.category === categoryFilter)
    .sort((a, b) => {
      if (sortBy === "price-low") return a.price - b.price
      if (sortBy === "price-high") return b.price - a.price
      if (sortBy === "newest") return b.year - a.year
      return 0
    })

  return (
    <main className="min-h-screen pt-16">
      <section className="py-12 bg-card border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <h1 className="text-4xl md:text-5xl font-bold mb-4">Our Inventory</h1>
          <p className="text-lg text-muted-foreground">Browse our complete collection of premium motorcycles</p>
        </div>
      </section>

      <section className="py-8 bg-background border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
            <div className="flex flex-col sm:flex-row gap-4 flex-1">
              <div className="w-full sm:w-48">
                <Select value={categoryFilter} onValueChange={setCategoryFilter}>
                  <SelectTrigger>
                    <SelectValue placeholder="Category" />
                  </SelectTrigger>
                  <SelectContent>
                    <SelectItem value="all">All Categories</SelectItem>
                    <SelectItem value="Sport">Sport</SelectItem>
                    <SelectItem value="Cruiser">Cruiser</SelectItem>
                    <SelectItem value="Adventure">Adventure</SelectItem>
                    <SelectItem value="Touring">Touring</SelectItem>
                  </SelectContent>
                </Select>
              </div>

              <div className="w-full sm:w-48">
                <Select value={sortBy} onValueChange={setSortBy}>
                  <SelectTrigger>
                    <SelectValue placeholder="Sort by" />
                  </SelectTrigger>
                  <SelectContent>
                    <SelectItem value="newest">Newest First</SelectItem>
                    <SelectItem value="price-low">Price: Low to High</SelectItem>
                    <SelectItem value="price-high">Price: High to Low</SelectItem>
                  </SelectContent>
                </Select>
              </div>
            </div>

            <div className="text-sm text-muted-foreground">{filteredBikes.length} motorcycles found</div>
          </div>
        </div>
      </section>

      <section className="py-12">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {filteredBikes.map((bike) => (
              <Card
                key={bike.id}
                className="overflow-hidden group cursor-pointer hover:border-primary transition-colors"
              >
                <Link href={`/inventory/${bike.id}`}>
                  <div className="relative h-64 overflow-hidden">
                    <img
                      src={bike.image || "/placeholder.svg"}
                      alt={bike.name}
                      className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                    />
                    <div className="absolute top-4 right-4 bg-primary text-primary-foreground px-3 py-1 rounded-full text-sm font-semibold">
                      {bike.year}
                    </div>
                    {bike.mileage === 0 && (
                      <div className="absolute top-4 left-4 bg-accent text-accent-foreground px-3 py-1 rounded-full text-sm font-semibold">
                        New
                      </div>
                    )}
                  </div>
                  <CardContent className="p-6">
                    <div className="text-sm text-muted-foreground mb-2">{bike.category}</div>
                    <h3 className="text-xl font-bold mb-2">{bike.name}</h3>
                    <div className="text-sm text-muted-foreground mb-4">{bike.mileage.toLocaleString()} miles</div>
                    <div className="flex items-center justify-between">
                      <span className="text-2xl font-bold text-primary">${bike.price.toLocaleString()}</span>
                      <Button variant="ghost" size="sm">
                        View Details <ArrowRight className="ml-2 h-4 w-4" />
                      </Button>
                    </div>
                  </CardContent>
                </Link>
              </Card>
            ))}
          </div>
        </div>
      </section>
    </main>
  )
}
